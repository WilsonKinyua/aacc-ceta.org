@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Gallery</h4>
    </div>
    <div class="container my-5">

        <div class="row">
            @foreach ($galleries as $image)
                @foreach ($image->image as $key => $media)
                    <div class="col-md-3">
                        <div class="card shadow">
                            <a class="gallery-image-link" href="{{ $media->getUrl() }}" data-lightbox="gallerygallery-set"
                                data-title="AACC" data-description="{{ $image->caption }}">
                                <img class="gallery-image" src="{{ $media->getUrl() }}" alt="{{ $image->caption }}" /></a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

    </div>
@endsection
