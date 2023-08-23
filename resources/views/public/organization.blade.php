@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Profiles</h4>
    </div>
    <div class="container my-5">
        <div class="row">
            @foreach ($teams as $team)
                <div class="col-md-3 mb-3">
                    <a href="{{ route('organization.team-details', $team->slug) }}" class="link_normal">
                        <div class="card shadow profile-card text-center">
                            <div class="img_cont">
                                @if ($team->profile_avatar)
                                    <img src="{{ $team->profile_avatar->getUrl() }}" width="100%">
                                @else
                                    <img src="https://procurement-portal.wezaprosoft.com/img/avatar.jpeg" width="100%">
                                @endif
                            </div>

                            <div class="card-body">
                                <h5>{{ $team->name ?? '' }}</h5>
                                <p></p>
                                <div class="text-muted text-small">
                                    {{ $team->created_at->toFormattedDateString() ?? '' }}
                                </div>
                            </div>

                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>
@endsection
