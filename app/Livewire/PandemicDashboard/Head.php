<?php

namespace App\Livewire\PandemicDashboard;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Head extends Component
{
    public function render(): Factory|View|Application
    {
        return view('livewire.pandemic-dashboard.head');
    }
}
