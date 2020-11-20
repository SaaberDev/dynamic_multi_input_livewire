@extends('layout.app')

@push('styles')
    {{-- custom style --}}
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @livewire('faq.faq-component')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Custom JS --}}
@endpush
