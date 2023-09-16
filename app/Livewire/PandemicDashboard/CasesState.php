<?php

namespace App\Livewire\PandemicDashboard;

use App\Http\Services\Covid\CasesStateService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class CasesState extends Component
{
    public string $updated_at = '';

    public string $positiveRate_updated_at = '';

    public Collection $newCase;

    public Collection $newDeath;

    public Collection $cumCase;

    public Collection $cumCasePercentage;

    public Collection $cumDeath;

    public Collection $fatalityRate;

    public Collection $tests;

    public Collection $positiveRate;

    public Collection $newRecovered;

    public Collection $cumRecovered;

    public Collection $activeCase;

    public Collection $activeCasePercentage;

    public bool $readyToLoad = false;

    public function render(CasesStateService $service): View
    {
        $this->initVariable($service);

        return view('livewire.pandemic-dashboard.cases-state');
    }

    public function placeholder(): View
    {
        return view('livewire.pandemic-dashboard.cases-state-placeholder');
    }

    private function initVariable(CasesStateService $service): void
    {
        $cases = $service->getCases();
        $death = $service->getDeath();
        $tests = $service->getTest();

        $this->updated_at = $cases->first()->date->toDateString();
        $this->positiveRate_updated_at = $tests->first()->date->toDateString();

        $this->newCase = $cases->pluck('cases_new', 'state');
        $this->cumCase = $cases->pluck('cases_cumulative', 'state');
        $this->cumCasePercentage = $cases->pluck('cumPercentage', 'state');

        $this->newRecovered = $cases->pluck('cases_recovered', 'state');
        $this->cumRecovered = $cases->pluck('cases_recovered_cumulative', 'state');

        $this->activeCase = $cases->pluck('activeCase', 'state');
        $this->activeCasePercentage = $cases->pluck('activeCasePercentage', 'state');

        $this->newDeath = $death->pluck('deaths_new', 'state');
        $this->cumDeath = $death->pluck('deaths_commutative', 'state');
        $this->fatalityRate = $service->calcFatalityRate()->pluck('fatalityRate', 'state');

        $this->tests = $tests->pluck('totalTest', 'state');
        $this->positiveRate = $service->calcPositiveRate()->pluck('positiveRate', 'state');
    }
}