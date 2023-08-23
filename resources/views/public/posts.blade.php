@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Posts</h4>
    </div>
    <div class="container">
        <div class="row mt-5">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="card post-list shadow border-0 p-3">
                        <p class="ms-3 text-end"> <small><i class="fa fa-calendar"></i> {{ $post->created_at }} / <i
                                    class="fa fa-user"></i> Comms Office</small></p>
                        <div class="text-end">
                            <div class="post_img">
                                @foreach ($post->image as $key => $media)
                                    <img src="{{ $media->getUrl() }}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="color">
                                {{ $post->title }}
                            </h4>
                            <p>
                                <a href="{{ route('post', $post->slug) }}">News</a>
                            </p>
                            <div class=" text-muted text-small text-end">
                                <a href="{{ route('post', $post->slug) }}" class="btn btn-sm bg-sec-color text-white"> Read
                                    More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
