@extends('livewire.layouts.dashboard')

@section('title', 'Home')

@push('breadcrumbs')
    <x-dashboard.breadcrumbs :breadcrumbs="[
            'Dashboard' => route('home'),
            'Home' => route('home')
        ]" />
@endpush

@section('content')
    <div>
        The best athlete wants his opponent at his best.
    </div>
@endsection