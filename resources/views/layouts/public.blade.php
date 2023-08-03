<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="AACC">
    <meta name="author" content="AACC">

    <meta property="og:title" content="AACC" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />
    <meta property="og:image" content="{{ asset('res/aacc-logo.png') }}" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('res/ico/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('res/ico/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('res/ico/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('res/ico/site.webmanifest') }}">



    <base />
    <title>AACC</title>


    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/module.min.css') }}" />

</head>

<body>
    <div class="loader">
        <div class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <section class="navigation">
        <nav id="main_nav" class="navbar navbar-expand-lg header home-main-nav">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <div class="logo">
                        <img src="{{ asset('res/aacc-logo.png') }}" alt="">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar"
                    aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <nav id="main-nav" class="ms-auto">
                        <ul id="main-menu" class="sm sm-simple">
                            <li><a class="current" href="/"> Home</a></li>
                            <li><a class="" href="#"> About</a>
                                <ul class="sub_menu">
                                    <li><a href="{{ route('about') }}"> About us</a></li>
                                    <li><a href="{{ route('organization') }}"> The Organization</a></li>
                                </ul>
                            </li>
                            <li><a class="" href="{{ route('what-we-do') }}"> What we Do</a></li>
                            <li><a class="" href="member_churches"> Member Churches</a></li>

                            <li><a class="" href="#"> Resources</a>
                                <ul class="sub_menu">
                                    <li><a href="posts.html">News</a></li>
                                    <li> <a href="gallery.html" class="news">Gallery</a></li>
                                    <li> <a href="./aacc-statements.html" class="news">Statements</a></li>
                                    <li> <a href="./careers.html" class="news">Careers</a></li>
                                    <li> <a target="_blank" href="./res/papers.pdf" class="news">Papers</a></li>
                                    <li> <a href="./policies.html" class="news">Policies</a></li>
                                    <li> <a target="_blank" href="./res/prayer-alerts.pdf" class="news">Prayer
                                            Alerts</a></li>
                                    <li> <a href="./african-pulse.html" class="news">African Pulse</a></li>
                                </ul>


                            </li>
                            <li><a class="" href="contacts.html"> Contact us</a></li>

                        </ul>
                    </nav>
                </div>


            </div>


        </nav>


    </section>
    <div class="main-body">
        @yield('content')
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 ">
                    <img src="res/aacc-logo.png" alt="" height="150px">
                    <h4>All Africa Conference of Churches (AACC)</h4>
                    <p>AACC is a continental ecumenical body that accounts for over 140 million Christians across
                        the
                        continent.</p>
                </div>
                <div class="col-md-4 ">
                    <div class="footer_links">
                        <h4>Quick Links</h4>
                        <a href="#" target="_blank" rel="noopener noreferrer">Togo Regional Office</a>
                        <a href="https://desmondtutuconferencecentre.org/" target="_blank"
                            rel="noopener noreferrer">Desmond Tutu Conference Centre</a>
                        <a href="#" target="" rel="noopener noreferrer">AACC Staff</a>
                        <a href="#" target="" rel="noopener noreferrer">African Union Office & Advocacy
                        </a>
                        <a href="https://allafricayouthcongress.org/" target="_blank" rel="noopener noreferrer">All
                            Africa Youth Congress </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>Get in touch</h4>
                    <div class="contact-block mt-3">
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
                            <span class="contact-block-body"> +254 20 4441483 <br> +254 20 4441338 <br> +254 20
                                4441339</span>
                        </div>
                    </div>
                    <div class="social_block">
                        <a href="https://www.facebook.com/aacc.ceta.35" class="text-white" target="_blank"
                            rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
                        <a href="http://www.twitter.com/AaccCeta" class="text-white" target="_blank"
                            rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                        <a href="http://www.youtube.com/channel/UCAHNomP9m32yCa4wJpMNWXA" class="text-white"
                            target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container text-center">
            <p>© 2023 All Africa Conference of Churches (AACC-CETA). All rights reserved.</p>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="LoginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                    </div>

                    <form class="user" method="POST" action="https://aacc.wezadevelopments.com/login">
                        <input type="hidden" name="link" value="/" />
                        <div class="mb-3">
                            <label for="username" class="form-label">Username / Email address</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Your Username / Email Address" value="" />
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="**********" />
                            <span title="Toggle Password visibility" class="input-group-text password-toggler"
                                onclick="showPassword()" id="showpassword"><i id="pass_togler_eye"
                                    class="fa fa-eye-slash"></i></span>
                        </div>

                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LfFSZ4UAAAAALNBYt6wGoB5qgkfladV8HGB1I2G"></div>
                        </div>


                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in-alt"></i>
                                    Login</button>
                            </div>
                        </div>

                    </form>
                    <div class="text-center mt-4">
                        <a class="small" href="forgotpassword.html">Forgot Password?</a> |
                        <a class="small" href="register.html">Don't have an account?</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/module.min.js') }}"></script>

    <script>
        $(function() {
            $('.map_country').mouseenter(function() {
                /* $('#' + this.id + '_marker').show(); */
            });
            $('.map_country').mouseleave(function() {
                /* $('#' + this.id + '_marker').hide(); */
            });

            $('.map_country').on('click', function() {
                $('.active_country').removeClass('is_active');
                $('.mc_country_details').removeClass('is_shown').addClass('is_hidden');
                $('#' + this.id + '_marker').addClass('is_active');
                $('#' + this.id + '_country').addClass('is_shown').removeClass('is_hidden');
            });

            $('.fa-bars').click(function() {
                $('.collapse:not(.show)').collapse('show').addClass('mt-5');
                // hide on click again
                $('.collapse.show').collapse('hide');
            });
        })
    </script>


    </div>

</body>



</html>