<?php

namespace App\Livewire\PandemicState;

use App\Http\Services\Covid\HealthCareService;
use App\Models\Hospital;
use App\Models\ICU;
use App\Models\PKRC;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class HealthCare extends Component
{
    public ICU $ICU;

    public Hospital $hospital;

    public ?PKRC $PKRC;

    public string $state = 'Johor';

    protected $listeners = ['CovidStateUpdate'];

    public function render(HealthCareService $service): View
    {
        $this->initVariable($service);

        return view('livewire.pandemic-state.health-care');
    }

    public function placeholder(): View
    {
        return view('livewire.pandemic-state.health-care-placeholder');
    }

    public function CovidStateUpdate(string $state): void
    {
        $this->state = $state;
    }

    public function updatedState(): void
    {
        $this->dispatch('CovidStateUpdate', $this->state);
    }

    private function initVariable(HealthCareService $service): void
    {
        $this->ICU = $service->getICU()->firstWhere('state', $this->state);
        $this->hospital = $service->getHospital()->firstWhere('state', $this->state);
        $this->PKRC = $service->getPKRC()->firstWhere('state', $this->state);
    }
}
