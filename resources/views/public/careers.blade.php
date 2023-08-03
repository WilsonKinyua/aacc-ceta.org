@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Careers</h4>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($careers as $career)
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @if ($career->career_document)
                                @if ($career->career_document_preview)
                                    <a href="{{ $career->career_document->getUrl() }}" target="_blank">
                                        <img src="{{ $career->career_document_preview->getUrl() }}" width="100%;">
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
