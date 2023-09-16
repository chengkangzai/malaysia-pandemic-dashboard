<?php

namespace App\Livewire\PandemicDashboard;

use App\Http\Services\Covid\VaxStateService;
use App\Models\Population;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class VaxState extends Component
{
    public Collection $daily_partial;

    public Collection $daily_full;

    public Collection $daily_booster;

    public Collection $daily_booster2;

    public Collection $vaxReg;

    public Collection $vaxRegPrecent;

    public string $timestamp = '';

    public mixed $popFilter = 'ABOVE_18';

    public bool $readyToLoad = false;

    public function render(VaxStateService $service): View
    {
        $this->initVariable($service);

        return view('livewire.pandemic-dashboard.vax-state');
    }

    public function placeholder(): View
    {
        return view('livewire.pandemic-dashboard.vax-state-placeholder');
    }

    public function load(): void
    {
        $this->readyToLoad = true;
    }

    public function updatedPopFilter(): void
    {
        $this->dispatch('vaxPopulationUpdate', $this->popFilter);
    }

    private function initVariable(VaxStateService $service): void
    {
        $vax = $service->getVax(Population::POP_FILTER[$this->popFilter]);
        $vaxReg = $service->getVaxReg(Population::POP_FILTER[$this->popFilter]);

        $this->timestamp = $vax->first()->date->toDateString();

        $this->daily_partial = $vax->pluck('daily_partial', 'state');
        $this->daily_full = $vax->pluck('daily_full', 'state');
        $this->daily_booster = $vax->pluck('daily_booster', 'state');
        $this->daily_booster2 = $vax->pluck('daily_booster2', 'state');

        $this->vaxReg = $vaxReg->pluck('total', 'state');
        $this->vaxRegPrecent = $vaxReg->pluck('registeredPrecent', 'state');
    }
}
