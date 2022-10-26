@extends('layouts.panel.dashboard')

@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-body">
                @livewire('create-notification')
            </div>
        </div>
    </div>
@endsection
