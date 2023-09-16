<?php

namespace App\Http\Livewire\PandemicVaccination;

use App\Models\VaxRegState;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Vaccination extends Component
{
    public function render(): Factory|View|Application
    {
        return view('livewire.pandemic-vaccination.vaccination');
    }

    public function exportPL(): StreamedResponse
    {
        $content = collect();
        $content->push("%License : Any form of copy or plagiarising of this file academically is strictly prohibited and consider as abuse.\n");
        $content->push("%Credit & Author : Ching Cheng Kang\n");
        $content->push('%Downloaded Date : '.now()->toDateTimeString()."\n");
        $content->push("%All right reserved\n\n");
        $content->push("%Vaccination Report\n");
        $content->push("%Facts \n");

        VaxRegState::latestOne()
            ->get()
            ->each(function ($vaccination) use ($content) {
                $state = str($vaccination->state)->replace('W.P. ', '')->snake();
                $content->push("vaxreg($state,$vaccination->total).\n");
            });

        $content->push("\n");
        $content->push("printAll:-\n");
        $content->push("    write('State -- Registration'),nl,\n");
        $content->push("    forall(vaxreg(S,T), (write(S),write(' '),write(T),nl)).\n\n");

        $filePath = 'vaccination.pl';
        Storage::put($filePath, $content->implode(''));

        return Storage::download($filePath);
    }
}
