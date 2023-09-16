<?php

namespace App\Livewire\PandemicDashboard;

use App\Http\Services\Covid\CasesMalaysiaService;
use App\Models\CasesMalaysia;
use App\Models\DeathsMalaysia;
use App\Models\Population;
use App\Models\TestMalaysia;
use App\Models\VaxMalaysia;
use App\Models\VaxRegMalaysia;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Malaysia extends Component
{
    public CasesMalaysia $cases;

    public DeathsMalaysia $death;

    public TestMalaysia $test;

    public VaxMalaysia $vax;

    public VaxRegMalaysia $vaxReg;

    public array $timestamp = [];

    public int $clusterCount = 0;

    public int|float $positiveRate = 0;

    public int|float $fatalityRate = 0;

    public int $positiveRateCase = 0;

    protected $listeners = ['vaxPopulationUpdate'];

    public mixed $popFilter = 'ABOVE_18';

    public function render(CasesMalaysiaService $service): View
    {
        $this->initVariable($service);

        return view('livewire.pandemic-dashboard.malaysia');
    }

    public function placeholder(): View
    {
        return view('livewire.pandemic-dashboard.malaysia-place-holder');
    }

    public function load()
    {
        $this->readyToLoad = true;
    }

    /**
     * Listen to vaxPopulation
     */
    public function vaxPopulationUpdate(string $popFilter): void
    {
        $this->popFilter = $popFilter;
    }

    private function initVariable(CasesMalaysiaService $service): void
    {
        $this->cases = $service->getCases();
        $this->death = $service->getDeath();
        $this->test = $service->getTest();
        $this->vax = $service->getVax(Population::POP_FILTER[$this->popFilter]);
        $this->vaxReg = $service->getVaxReg(Population::POP_FILTER[$this->popFilter]);

        $this->clusterCount = $service->getClusterCount();
        $this->fatalityRate = $service->calcFatalityRate();

        $positiveRateCase = $service->calcPositiveRate();
        $this->positiveRate = $positiveRateCase->positiveRate;
        $this->positiveRateCase = $positiveRateCase->cases_new;
        $this->timestamp = $service->getTimestamp();
    }
}
