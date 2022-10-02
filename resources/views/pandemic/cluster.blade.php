@extends('layouts.app')

@section('content')
    @include('partial.rocket')
    <livewire:cluster-search/>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
