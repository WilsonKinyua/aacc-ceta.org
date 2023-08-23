@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">{{ $team->name ?? '' }} Profile</h4>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile_image">
                                @if ($team->profile_avatar)
                                    <img src="{{ $team->profile_avatar->getUrl() }}" width="100%">
                                @else
                                    <img src="https://procurement-portal.wezaprosoft.com/img/avatar.jpeg" width="100%">
                                @endif
                                <h5>{{ $team->name ?? '' }}</h5>
                                <p>
                                    <span class="profile_social_links">

                                    </span>
                                </p>
                            </div>

                        </div>

                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="sec-color">{{ $team->position ?? '' }}</h5>
                                @if ($team->email)
                                    <p><i class="fa fa-envelope"></i> {{ $team->email }}</p>
                                @endif
                                @if ($team->phone)
                                    <p><i class="fa fa-phone"></i> {{ $team->phone }}</p>
                                @endif
                                <div>
                                    {!! $team->bio ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
