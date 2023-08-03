@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">{{ $memberChurch->country->name ?? '' }}</h4>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="row count_cont">
                        <div class="col-md-10 ms-auto">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card-body ">
                                        <h4 class="sec-color">{{ $memberChurch->country->name ?? '' }}</h4>
                                        <p class="color">Country: {{ $memberChurch->country->name ?? '' }}</p>
                                        <div><span style="font-size: 16px;">{{ $memberChurch->location ?? '' }}</span></div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="country_sec">
                                        <i class="af africa-tanzania"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>


        <div class="row p-3">
            <div class="col-12">
                <div>
                    <h4>Contacts</h4>
                </div>
            </div>
            @foreach ($memberChurch->memberChurchCenterMemberChurchContacts as $contact)
                <div class="col-6">
                    <div class="card card-body border-0 shadow-lg">
                        <div class="mc_country_details">
                            <div class="member_church">
                                <div class="address">
                                    {!! $contact->address ?? '' !!}
                                </div>
                                <div class="email">
                                    <span class="member_church-icon"><i class="fa fa-envelope"></i></span>
                                    <span class="member_church-body">
                                        {{ $contact->email ?? '' }}
                                    </span>
                                </div>
                                <div class="phone">
                                    <span class="member_church-icon"><i class="fa fa-phone"></i></span>
                                    <span class="member_church-body">
                                        {{ $contact->phone_number ?? '' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
