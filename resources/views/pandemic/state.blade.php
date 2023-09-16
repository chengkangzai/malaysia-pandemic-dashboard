@extends('layouts.app')

@section('content')
    @include('partial.rocket')
    <div class="mx-2">
        <livewire:pandemic-state.head :state="$state" />
{{--        <livewire:pandemic-state.dashboard :state="$state" />--}}
{{--        <livewire:pandemic-state.health-care :state="$state" />--}}
{{--        <livewire:pandemic-state.graph :state="$state" />--}}
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
