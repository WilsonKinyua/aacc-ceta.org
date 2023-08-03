@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg') }}" alt="">
        <h4 class="header-title">Contact Us</h4>
    </div>
    <div class="container">


        <div class="row">
            <div class="col-md-8 mt-5">
                <h4>Contact us</h4>
                @if (session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if ($errors->count() > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                <li>{{ $error }}</li>
                            </ul>
                        </div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('contact.create') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name" class="required">Your Name</label>
                                    <input type="text" name="name" id="name" placeholder="Your name*"
                                        class="form-control" required value="{{ old('name', '') }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email" class="required">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Your Email*"
                                        class="form-control" required value="{{ old('email', '') }}" />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone" class="required">Your Phone</label>
                                    <input type="text" name="phone" id="phone" placeholder="Your phone"
                                        class="form-control" value="{{ old('phone', '') }}" />
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="subject" class="required">Subject</label>
                                    <input type="text" name="subject" id="subject" placeholder="Subject*"
                                        class="form-control" required value="{{ old('subject', '') }}" />
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="message" class="required">Your Message</label>
                                    <textarea name="message" id="message" class="form-control" placeholder="Your message*" required>{{ old('message', '') }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 bg-color text-white mt-5">
                <h4>Get in touch</h4>
                <hr>
                <div class="contact-block ">
                    <div class="address">
                        <span class="contact-block-icon"><i class="fa fa-home"></i></span>
                        <span class="contact-block-body">All Africa Conference of Churches (AACC-CETA)<br />
                            General Secretariat.<br />
                            Waiyaki Way - Nairobi, Kenya.<br />
                            P.O. Box 14205-00800 Westlands,<br />
                            Nairobi, Kenya.</span>
                    </div>
                    <div class="email">
                        <span class="contact-block-icon"><i class="fa fa-envelope"></i></span>
                        <span class="contact-block-body">secretariat@aacc-ceta.org</span>
                    </div>
                    <div class="phone">
                        <span class="contact-block-icon"><i class="fa fa-phone"></i></span>
                        <span class="contact-block-body"> +254 20 4441483 | +254 20 4441338 | +254 20 4441339</span>
                    </div>
                </div>
                <div class="social_block text-center">
                    <hr>
                    <a href="https://www.facebook.com/aacc.ceta.35" class="text-white" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
                    <a href="http://www.twitter.com/AaccCeta" class="text-white" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                    <a href="http://www.youtube.com/channel/UCAHNomP9m32yCa4wJpMNWXA" class="text-white" target="_blank"
                        rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                </div>

            </div>

        </div>
    </div>

    <div class="row ">
        <div class="col-12 mt-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.403643814941!2d36.78622247671082!3d-1.261754885275208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1763f94bbe07%3A0x99634989c4997a05!2sAll%20Africa%20Conference%20of%20Churches!5e0!3m2!1sen!2ske!4v1628447660391!5m2!1sen!2ske"
                width="100%" height="450" style="border:0;" allowfullscreen="false" loading="lazy"></iframe>
        </div>
    </div>
@endsection
