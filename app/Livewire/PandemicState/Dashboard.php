<?php

namespace App\Livewire\PandemicState;

use App\Http\Services\Covid\CasesStateService;
use App\Http\Services\Covid\VaxStateService;
use App\Models\CasesState;
use App\Models\DeathsState;
use App\Models\Population;
use App\Models\TestState;
use App\Models\VaxRegState;
use App\Models\VaxState;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public TestState $test;

    public CasesState $cases;

    public DeathsState $death;

    public VaxState $vax;

    public VaxRegState $vaxReg;

    public array $timestamp = [];

    public int $activeClusterCount = 0;

    public mixed $popFilter = 'ABOVE_18';

    public float $positiveRate = 0;

    public float $fatalityRate = 0;

    public int $positiveRateCase = 0;

    public string $state = 'Johor';

    protected $listeners = ['CovidStateUpdate', 'vaxPopulationUpdate'];

    public function render(CasesStateService $casesStateService, VaxStateService $vaxStateService): View
    {
        $this->initVariable($casesStateService, $vaxStateService);

        return view('livewire.pandemic-state.dashboard');
    }

    public function placeholder(): View
    {
        return view('livewire.pandemic-state.dashboard-placeholder');
    }

    public function CovidStateUpdate(string $state): void
    {
        $this->state = $state;
    }

    public function vaxPopulationUpdate(string $popFilter): void
    {
        $this->popFilter = $popFilter;
    }

    private function initVariable(CasesStateService $casesStateService, VaxStateService $vaxStateService): void
    {
        $this->cases = $casesStateService->getCases()->firstWhere('state', $this->state);
        $this->death = $casesStateService->getDeath()->firstWhere('state', $this->state);
        $this->test = $casesStateService->getTest()->firstWhere('state', $this->state);

        $this->vax = $vaxStateService->getVax(Population::POP_FILTER[$this->popFilter])->firstWhere('state', $this->state);
        $this->vaxReg = $vaxStateService->getVaxReg(Population::POP_FILTER[$this->popFilter])->firstWhere('state', $this->state);

        $this->fatalityRate = $casesStateService->calcFatalityRate()->firstWhere('state', $this->state)->fatalityRate;
        $positiveRateCase = $casesStateService->calcPositiveRate()->firstWhere('state', $this->state);
        $this->positiveRate = $positiveRateCase->positiveRate;
        $this->positiveRateCase = $positiveRateCase->cases_new;

        $this->activeClusterCount = $casesStateService->getClusterCount($this->state);
        $this->timestamp = $casesStateService->getTimestamp();
    }
}
