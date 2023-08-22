@extends('layouts.public')
@section('content')
    <div class="page_header menu_gradient">
        <img src="{{ asset('res/about.jpg')}}" alt="">
        <h4 class="header-title">About Us</h4>
    </div>
    <div class="about_section bg-light">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 aacc-image_cont">
                    <div class="aacc-image">
                        <img src="{{ asset('res/about_image.jpg')}}" alt="">
                        <span class="first"></span>
                        <span class="second"></span>

                        <span class="third"></span>

                    </div>

                </div>
                <div class="col-md-6 about_page_about">
                    <h2 class="color">All Africa Conference of Churches (AACC)</h2>
                    <p>AACC is a continental ecumenical body that accounts for over 140 million Christians across
                        the continent.</p>
                    <p>AACC is the largest association of Protestant, Anglican, Orthodox and Indigenous churches in
                        Africa and is a member of the worldwide ecumenical network. AACC is a fellowship of 204
                        members comprising of Churches, National Councils of Churches (NCCs), theological and lay
                        training institutions and other Christian organizations in 42 African countries.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="our-values mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="ac ac-logo"></i>

                    <h3>Our values</h3>

                    <p>Churches in Africa together for life,
                        peace, justice and dignity.</p>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="ac ac-flag"></i>
                        <h3>Our Mission</h3>
                    </div>
                    <p>All Africa Conference of Churches (AACC) is a fellowship of churches and institutions in
                        Africa working together in their common witness to the Gospel by:</p>
                    <ul>
                        <li>Mobilizing to faithfully live the message of God’s love;</li>
                        <li>Nurturing a common understanding of the faith;</li>
                        <li>Interpreting and responding to challenges to human dignity; and,</li>
                        <li>Acting prophetically in word, life and services for healing.</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="ac ac-value"></i>
                        <h3>Core values</h3>
                    </div>
                    <p>In obedience to God and the imperatives of the Gospel and Christian ethical standards, we are
                        committed to operate:</p>
                    <ul>
                        <li>With integrity,</li>
                        <li>In the spirit of love,</li>
                        <li>Respecting the dignity and God’s image in every human being.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="about_principles bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white  p-5">
                    <div class="what-we-do">
                        <h2>AACC Programmatic Pillars</h2>
                        <p>Essentially, AACC seeks to engage churches in the search for theological positioning
                            through dialogue; walks with its members in their prophetic engagement in their
                            contexts; helps in capacity building and resource mobilization of the churches and
                            accompanies the members, especially during their times of crises.</p>
                        <p>In light of this, the AACC has identified four programmatic pillars to focus on in the
                            next five years.</p>
                        <p>These are:<br></p>
                        <ul class="square white">
                            <li>Advocacy At The African Union</li>
                            <li>Peace, Diakonia And Development</li>
                            <li>Gender, Women And Youth</li>
                            <li>Theology, Interfaith Relations And Ecclesial Leadership Development</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6  p-5">
                    <h2 class="color">Our Principles</h2>
                    <p>AACC works through and with member churches in the continent in the following ways:-</p>
                    <ul>
                        <li>We address issues facing the people of the African continent;</li>
                        <li>We are proactive and prophetic in the accompaniment of churches in Africa;</li>
                        <li>We engage in discernment for and promotion of positive transformation;</li>
                        <li>We mobilize our constituency to speak jointly on issues affecting the people of the
                            African continent;</li>
                        <li>We are committed to ecumenical vocation and in facilitating synergy amongst our members
                            and with the people of Africa;</li>
                        <li>We encourage creativity and innovation in our programmatic work; and</li>
                        <li>We are committed to promoting and defending African dignity.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="constituency">
        <div class="p-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-4">Our Constituency</h2>
                    </div>
                    <div class="clients_slider">
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
