<?php

namespace App\Http\Livewire\PandemicState;

use App\Http\Services\Covid\HealthCareService;
use App\Models\Hospital;
use App\Models\ICU;
use App\Models\PKRC;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class HealthCare extends Component
{
    public ICU $ICU;

    public Hospital $hospital;

    public ?PKRC $PKRC;

    public string $state = 'Johor';

    protected $listeners = ['CovidStateUpdate'];

    public bool $readyToLoad = false;

    public function mount()
    {
        $this->ICU = new ICU();
        $this->hospital = new Hospital();
        $this->PKRC = new PKRC();
    }

    public function render(HealthCareService $service): Factory|View|Application
    {
        if ($this->readyToLoad) {
            $this->initVariable($service);
        }

        return view('livewire.pandemic-state.health-care');
    }

    public function load()
    {
        $this->readyToLoad = true;
    }

    public function CovidStateUpdate(string $state)
    {
        $this->state = $state;
    }

    public function updatedState()
    {
        $this->emit('CovidStateUpdate', $this->state);
    }

    private function initVariable(HealthCareService $service): void
    {
        $this->ICU = $service->getICU()->firstWhere('state', $this->state);
        $this->hospital = $service->getHospital()->firstWhere('state', $this->state);
        $this->PKRC = $service->getPKRC()->firstWhere('state', $this->state);
    }
}
