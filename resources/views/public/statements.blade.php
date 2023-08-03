@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Statements</h4>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($statements as $statement)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            @if ($statement->statement_document)
                                @if ($statement->statement_document_preview)
                                    <a href="{{ $statement->statement_document->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $statement->statement_document_preview->getUrl() }}"
                                            style="height:500px;width:100%;">
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
