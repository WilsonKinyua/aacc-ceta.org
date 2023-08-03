@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">African Pulse </h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ asset('res/African Pulse Issue NO. 7 English.pdf') }}" target="_blank">
                    <div class="card shadow-sm mb-3 mt-3">
                        <div class="card-body">
                            <img src="{{ asset('res/african-pulse-1.png') }}" width="100%" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ asset('res/7ème édition de The African Pulse.pdf') }}" target="_blank">
                    <div class="card shadow-sm mb-3 mt-3">
                        <div class="card-body">
                            <img src="{{ asset('res/african-pulse-2.png') }}" width="100%" alt="">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
