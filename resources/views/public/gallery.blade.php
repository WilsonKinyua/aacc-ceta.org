@extends('layouts.public')
@section('content')
    <style>
        a {
            text-decoration: none;
        }
    </style>
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Gallery</h4>
    </div>
    <div class="container my-5">

        <div class="row g-1">
            @foreach ($categories as $category)
                @if ($category->image)
                    <div class="col-md-4">
                        <div class="card shadow mb-4 rounded border-none">
                            <a class="gallery-image-link" href="{{ route('gallery.category', $category->id) }}">
                                <img class="gallery-image" src="{{ $category->image->getUrl() }}"
                                    alt="{{ $category->name }}" />
                                <h4>
                                    <div class="card-body">
                                        {{ $category->name }}
                                    </div>
                                </h4>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
@endsection
