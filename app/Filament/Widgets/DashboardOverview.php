<?php

namespace App\Filament\Widgets;

use App\Models\CasesMalaysia;
use App\Models\DeathsMalaysia;
use App\Models\VaxMalaysia;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class DashboardOverview extends BaseWidget
{
    protected function getColumns(): int
    {
        return 3;
    }

    protected function getStats(): array
    {
        return [
            $this->covidCases(),
            $this->deathCases(),
            $this->recoverCases(),

            $this->firstVax(),
        ];
    }

    //REGION
    public function covidCases()
    {
        $data = Trend::query(CasesMalaysia::query())
            ->dateColumn('date')
            ->between(
                start: now()->subMonth(),
                end: now(),
            )
            ->perDay()
            ->sum('cases_new')
            ->map(fn (TrendValue $value) => intval($value->aggregate))
            ->toArray();

        $pastMonth = CasesMalaysia::whereBetween('date', [now()->subMonth(), now()])->sum('cases_new');

        return Stat::make('New Covid Case', number_format(CasesMalaysia::latestOne()->first()->cases_new))
            ->description('Last 30 days: '.number_format($pastMonth))
            ->color('danger')
            ->chart($data);
    }

    public function deathCases()
    {
        $data = Trend::query(DeathsMalaysia::query())
            ->dateColumn('date')
            ->between(
                start: now()->subMonth(),
                end: now(),
            )
            ->perDay()
            ->sum('deaths_new')
            ->map(fn (TrendValue $value) => intval($value->aggregate))
            ->toArray();

        $pastMonth = DeathsMalaysia::whereBetween('date', [now()->subMonth(), now()])->sum('deaths_new');

        return Stat::make('New Death Case', number_format(DeathsMalaysia::latestOne()->first()->deaths_new))
            ->description('Last 30 days: '.number_format($pastMonth))
            ->color('info')
            ->chart($data);
    }

    public function recoverCases()
    {
        $data = Trend::query(CasesMalaysia::query())
            ->dateColumn('date')
            ->between(
                start: now()->subMonth(),
                end: now(),
            )
            ->perDay()
            ->sum('cases_recovered')
            ->map(fn (TrendValue $value) => intval($value->aggregate))
            ->toArray();

        $pastMonth = CasesMalaysia::whereBetween('date', [now()->subMonth(), now()])->sum('cases_recovered');

        return Stat::make('New Recovered', number_format(CasesMalaysia::latestOne()->first()->cases_recovered))
            ->description('Last 30 days: '.number_format($pastMonth))
            ->color('success')
            ->chart($data);
    }

    //ENDREGION
    private function firstVax()
    {
        $data = Trend::query(VaxMalaysia::query())
            ->dateColumn('date')
            ->between(
                start: now()->subMonth(),
                end: now(),
            )
            ->perDay()
            ->sum('daily_full')
            ->map(fn (TrendValue $value) => intval($value->aggregate))
            ->toArray();

        $pastMonth = VaxMalaysia::whereBetween('date', [now()->subMonth(), now()])->sum('daily_full');

        return Stat::make('Total Vaccine Given', number_format(VaxMalaysia::latestOne()->first()->daily_full))
            ->description('Last 30 days: '.number_format($pastMonth))
            ->color('success')
            ->chart($data);
    }
}
