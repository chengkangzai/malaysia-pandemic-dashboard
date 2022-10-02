<?php

namespace App\Console\Commands;

use App;
use App\Console\Services\ImportPandemicService;
use App\Console\Services\InjestStation;
use App\Models\CasesMalaysia;
use App\Models\CasesState;
use App\Models\Cluster;
use App\Models\DeathsMalaysia;
use App\Models\DeathsState;
use App\Models\Hospital;
use App\Models\ICU;
use App\Models\PKRC;
use App\Models\Population;
use App\Models\TestMalaysia;
use App\Models\TestState;
use App\Models\VaxMalaysia;
use App\Models\VaxRegMalaysia;
use App\Models\VaxRegState;
use App\Models\VaxState;
use App\Notifications\ImportTaskFailedNotification;
use App\Notifications\ImportTaskSuccessNotification;
use App\Notifications\Notifiable\SuperAdminNotifiable;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class ImportPandemicDataCommand extends Command
{
    protected $signature = 'import:pandemic {--force : Truncate existing data before importing}';

    protected $description = 'Import All Malaysia Pandemic Data From Github';
    private array $models;

    public function __construct()
    {
        parent::__construct();

        $this->models = [
            CasesMalaysia::class,
            CasesState::class,
            DeathsState::class,
            DeathsMalaysia::class,
            TestMalaysia::class,
            TestState::class,
            Cluster::class,
            Hospital::class,
            ICU::class,
            PKRC::class,
            Population::class,
            VaxMalaysia::class,
            VaxState::class,
            VaxRegMalaysia::class,
            VaxRegState::class,
        ];
    }

    public function handle(): int
    {
        try {
            $time = microtime(true);
            $injectStation = new InjestStation($this);

            if ($this->option('force')) {
                $confirm = $this->confirm('Are you sure you want to truncate existing data?', false);
                if ($confirm) {
                    ImportPandemicService::clearCache();
                    $injectStation->truncate($this->models);
                } else {
                    $this->info('Import cancelled');

                    return self::INVALID;
                }
            }

            $this->info('Getting data from Github...');
            $service = new ImportPandemicService();
            $shouldUpdate = false;

            foreach ($this->models as $model) {
                $record = $service->factory($model);
                if ($injectStation->shouldUpdate($record, $model)) {
                    $injectStation->inject($record, $model);
                    $shouldUpdate = true;
                }
            }
            $runTime = microtime(true) - $time;
            $this->info("Import completed in {$runTime} seconds");

            if (App::isProduction() && $shouldUpdate) {
                Notification::send(new SuperAdminNotifiable(), new ImportTaskSuccessNotification(self::class, $this->models, $runTime));
                $this->call(UpdatePandemicBrowserScreenshot::class);
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
            if (App::isProduction()) {
                Notification::send(new SuperAdminNotifiable(), new ImportTaskFailedNotification($e->getMessage()));
            }

            return self::INVALID;
        }


        return self::SUCCESS;
    }
}
