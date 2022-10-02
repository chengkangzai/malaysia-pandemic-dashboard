<?php

namespace App\Http\Livewire\PandemicState\Graph;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class DeathPerDay extends Component
{
    public Collection $date;
    public Collection $deathCase;
    public Collection $bidCase;
    public Collection $dodCase;

    public function render(): Factory|View|Application
    {
        return view('livewire.pandemic-state.graph.death-per-day');
    }
}
