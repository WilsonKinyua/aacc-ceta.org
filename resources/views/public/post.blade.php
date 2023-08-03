@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">
            {{ $post->title ?? '' }}
        </h4>
    </div>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="row">
                        <div class="col-md-12 post_image">
                            @foreach ($post->image as $key => $media)
                                <img src="{{ $media->getUrl() }}" alt="">
                            @endforeach
                        </div>
                        <div class="col-12">
                            <div class="card-body">
                                <div>
                                    <p style="text-align: center;"><strong><u>{{ $post->title ?? '' }}</u></strong></p>
                                    <p style="text-align: justify;">
                                        {!! $post->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
