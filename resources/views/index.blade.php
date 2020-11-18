@extends('layout.app')

@push('styles')
    {{-- custom style --}}
@endpush

@section('content')
    @livewire('multi-input.multi-input')
@endsection

@push('scripts')
    {{-- Custom JS --}}
@endpush
