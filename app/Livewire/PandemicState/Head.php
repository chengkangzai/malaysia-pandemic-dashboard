<?php

namespace App\Livewire\PandemicState;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Head extends Component
{
    public string $state = 'Johor';

    public mixed $popFilter = 'ABOVE_18';

    protected $listeners = ['CovidStateUpdate'];

    public function render(): Factory|View|Application
    {
        return view('livewire.pandemic-state.head');
    }

    public function updatedState(): void
    {
        $this->dispatch('CovidStateUpdate', $this->state);
    }

    public function CovidStateUpdate(string $state): void
    {
        $this->state = $state;
    }

    public function updatedPopFilter(): void
    {
        $this->dispatch('vaxPopulationUpdate', $this->popFilter);
    }
}
