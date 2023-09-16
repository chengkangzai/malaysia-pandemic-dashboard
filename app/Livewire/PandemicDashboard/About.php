<?php

namespace App\Livewire\PandemicDashboard;

use App\Http\Services\Covid\CasesMalaysiaService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class About extends Component
{
    public array $timestamp = [];

    public bool $readyToLoad = false;

    public function render(CasesMalaysiaService $service): Factory|View|Application
    {
        if ($this->readyToLoad) {
            $this->timestamp = $service->getTimestamp();
        }

        return view('livewire.pandemic-dashboard.about');
    }

    public function load()
    {
        $this->readyToLoad = true;
    }
}