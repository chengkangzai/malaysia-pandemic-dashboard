<?php

namespace App\Livewire\PandemicState;

use App\Http\Services\Covid\Graph\CovidStateGraphService;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Graph extends Component
{
    public string $state = 'Johor';

    public string $filter = 'TWO_WEEK';

    protected $listeners = ['CovidStateUpdate'];

    public Collection $date;

    public Collection $confirmCase;

    public Collection $recoveredCase;

    public Collection $deathCase;

    public Collection $activeCase;

    public Collection $bidCase;

    public Collection $dodCase;

    public Collection $cat1;

    public Collection $cat2;

    public Collection $cat3;

    public Collection $cat4;

    public Collection $cat5;

    public Collection $cumRecoveredCase;

    public Collection $cumDeathCase;

    public function render(): Factory|View|Application
    {
        $this->initVariable();

        return view('livewire.pandemic-state.graph');
    }

    public function updating($property, $value): void
    {
        if ($property === 'state') {
            $this->state = $value;
            $this->initVariable();
            $this->notifyChild();
        }

        if ($property === 'filter') {
            $this->filter = $value;
            $this->initVariable();
            $this->notifyChild();
        }
    }

    public function notifyChild(): void
    {
        $this->dispatch('CovidStateUpdate',
            date: $this->date,
            confirmCase: $this->confirmCase,
            recoveredCase: $this->recoveredCase,
            deathCase: $this->deathCase,
            bidCase: $this->bidCase,
            dodCase: $this->dodCase,
            activeCase: $this->activeCase,
            cat1: $this->cat1,
            cat2: $this->cat2,
            cat3: $this->cat3,
            cat4: $this->cat4,
            cat5: $this->cat5,
            cumRecoveredCase: $this->cumRecoveredCase,
            cumDeathCase: $this->cumDeathCase,
        );
    }

    public function initVariable(): void
    {
        $service = app(CovidStateGraphService::class);
        $cases = $service->getCases($this->state, $this->filter);
        $deaths = $service->getDeath($this->state, $this->filter);
        $healthCareCategory = $service->getHealthCare($this->state, $this->filter);

        $this->date = $cases->pluck('date')->map(fn ($date) => Carbon::parse($date)->toDateString());
        $this->confirmCase = $cases->pluck('cases_new');
        $this->recoveredCase = $cases->pluck('cases_recovered');
        $this->cumRecoveredCase = $cases->pluck('cases_recovered_cumulative');
        $this->deathCase = $deaths->pluck('deaths_new');
        $this->cumDeathCase = $deaths->pluck('deaths_commutative');
        $this->bidCase = $deaths->pluck('deaths_bid');
        $this->dodCase = $deaths->pluck('deaths_bid_dod');
        $this->activeCase = $cases->pluck('activeCase');

        $this->cat1 = $healthCareCategory->pluck('cat1');
        $this->cat2 = $healthCareCategory->pluck('cat2');
        $this->cat3 = $healthCareCategory->pluck('cat3');
        $this->cat4 = $healthCareCategory->pluck('cat4');
        $this->cat5 = $healthCareCategory->pluck('cat5');
    }
}
