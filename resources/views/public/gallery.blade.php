@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Gallery</h4>
    </div>
    <div class="container my-5">

        <div class="row g-1">
            @foreach ($gallery as $image)
                <div class="col-md-3">
                    <div class="card shadow">
                        @foreach ($image->image as $key => $media)
                            <a class="gallery-image-link" href="{{ $media->getUrl() }}" data-lightbox="gallerygallery-set"
                                data-title="AACC" data-description="">
                                <img class="gallery-image" src="{{ $media->getUrl() }}" alt="{{ $image->caption }}" /></a>
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>

    </div>
@endsection
