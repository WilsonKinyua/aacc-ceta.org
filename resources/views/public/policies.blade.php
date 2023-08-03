@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Policies</h4>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <a
                            href="{{ asset('res/Trousse à outils de plaidoyer pour la justice pour les veuves French.pdf') }}"><img
                                src="{{ asset('res/policy.png') }}" alt="" style="height:500px;width:100%;"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <a href="{{ asset('res/policies.pdf') }}"><img src="{{ asset('res/policies-1.png') }}"
                                alt="" style="height:500px;width:100%;"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <a href="{{ asset('res/Advocacy Toolkit for Justice for Widows.pdf') }}"><img
                                src="{{ asset('res/policies-2.png') }}" alt="" style="height:500px;width:100%;"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
