@extends('layouts.app')

@section('content')
    @include('partial.rocket')
    <div class="mx-2">
        <livewire:pandemic-dashboard.head/>
        <livewire:pandemic-dashboard.malaysia/>
        <livewire:pandemic-dashboard.cases-state/>
        <livewire:pandemic-dashboard.vax-state/>
        <livewire:pandemic-dashboard.health-care-state/>
        <livewire:pandemic-dashboard.graph/>
        <livewire:pandemic-dashboard.about/>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
