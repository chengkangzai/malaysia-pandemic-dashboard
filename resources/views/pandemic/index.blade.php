@extends('layouts.app')

@section('content')
    @include('partial.rocket')
    <div class="mx-2">
        <section class="mt-2 rounded-2xl bg-gray-50 py-2 shadow dark:bg-white dark:text-black" id="malaysia-dashboard"
                 wire:loading.class="animate-pulse" xmlns:wire="">
            <a href="#malaysia-dashboard">
                <h1 class="px-2 text-2xl font-bold sm:text-5xl">{{ __('Covid-19 Malaysia Dashboard ') }}
                    <img height="32" width="64" loading="lazy" src="{{ asset('src/64px-Flag_of_Malaysia.svg.png') }}"
                         alt="Malaysia Flag" class="inline">
                    <img height="32" width="64" loading="lazy" src="{{ asset('src/64px-Flag_of_Malaysia.svg.png') }}"
                         alt="Malaysia Flag" class="inline">
                    <img height="32" width="64" loading="lazy" src="{{ asset('src/64px-Flag_of_Malaysia.svg.png') }}"
                         alt="Malaysia Flag" class="inline">
                </h1>
            </a>
            <div>
                <ul class="list-inside list-disc px-2">
                    <li>{{ __('Data Source : ') }}
                        <a href="https://github.com/MoH-Malaysia/covid19-public/tree/main/epidemic" rel="noreferrer"
                           class="text-blue-500 underline">
                            {{ __('MOH Github') }}
                        </a>
                        ,
                        <a href="https://github.com/CITF-Malaysia/citf-public" rel="noreferrer"
                           class="text-blue-500 underline">
                            {{ __('CITF Github') }}
                        </a>
                    </li>
                    <li>
                        {{ __('I am not a data analyst, so displayed data might not be accurate or suitable.') }}
                    </li>
                    <li>
                        {{ __('Me and this project are not affiliated with any Government body') }}
                    </li>
                    <li>
                        <a href="#about" class="text-blue-500 underline">{{ __('About and data updated time') }}</a>
                    </li>
                </ul>
                <p class="font-bold"> {{ __('* per population') }}</p>
            </div>
        </section>

        <livewire:pandemic-dashboard.malaysia lazy/>
        <livewire:pandemic-dashboard.cases-state lazy/>
        <livewire:pandemic-dashboard.vax-state lazy/>
        <livewire:pandemic-dashboard.health-care-state lazy/>
        <livewire:pandemic-dashboard.graph/>
        <livewire:pandemic-dashboard.about/>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
