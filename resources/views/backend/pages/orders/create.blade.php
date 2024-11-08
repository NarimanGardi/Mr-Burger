@extends('backend.app')
@section('title', __('زیادکردنی داواکاری'))
@section('content')
    <div class="page-content">
        <div class="container-xxxl flex-grow-1 container-p-y">
            @livewire('order-create')
        </div>
    </div>
@endsection
