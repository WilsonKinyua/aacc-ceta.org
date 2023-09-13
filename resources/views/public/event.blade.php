@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">{{ $event->title ?? '' }}</h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 mb-5">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @if ($event->poster)
                                <div class="col-md-4 mt-3">
                                    <img src="{{ $event->poster->getUrl() }}" alt="{{ $event->title }}" width="100%">
                                </div>
                                <div class="col-md-8">
                                    {!! $event->description ?? '' !!}
                                </div>
                            @else
                                <div class="col-md-12">
                                    {!! $event->description ?? '' !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
