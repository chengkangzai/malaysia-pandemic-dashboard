<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PublicPandemicController extends Controller
{
    public function index(): Factory|View|Application
    {
        SEOTools::setTitle(__('Dashboard'));

        return view('pandemic.index');
    }

    public function state(): Factory|View|Application
    {
        SEOTools::setTitle(__('State View'));

        $state = request()->has('state') ? request()->state : 'Johor';

        return view('pandemic.state', compact('state'));
    }

    public function clusters()
    {
        SEOTools::setTitle(__('Clusters'));

        return view('pandemic.cluster');
    }

    public function vaccination()
    {
        SEOTools::setTitle(__('Vaccination'));

        return view('pandemic.vaccination');
    }
}
