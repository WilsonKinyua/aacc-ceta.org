@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="res/about.jpg" alt="">
        <h4 class="header-title">Member churches</h4>
    </div>
    <div class="container my-5">
        <div class="row">

            @foreach ($memberChurches as $church)
                <div class="col-md-2 mb-3">
                    <a href="{{ route('member-church', $church->slug) }}" class="link_normal">
                        <div class="card text-center border-0 shadow-lg">
                            <div class="card-body">
                                <span style="font-size:3rem">
                                    <i class="fa fa-globe sec-color"></i>
                                </span>
                                <h4 class="color">{{ $church->country->name }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
