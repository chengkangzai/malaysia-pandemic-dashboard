<?php

namespace App\Http\Livewire\PandemicDashboard\Graph;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class ActiveCasePercentage extends Component
{
    public Collection $date;
    public Collection $activeCase;
    public Collection $cumRecoveredCase;
    public Collection $cumDeathCase;

    public function render(): Factory|View|Application
    {
        return view('livewire.pandemic-dashboard.graph.active-case-percentage');
    }
}
