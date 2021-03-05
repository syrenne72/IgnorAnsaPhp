<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="/css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="/css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="/js/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--Menu-->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 fh5co_padding_menu">
                    <img src="/png/logo.jpg" alt="img" class="fh5co_logo_width"/>
                </div>
                <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                    <div class="text-center d-inline-block">
                        <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-search"></i></div></a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div></a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a href="https://twitter.com/fh5co" target="_blank" class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div></a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a href="https://fb.com/fh5co" target="_blank" class="fh5co_display_table"><div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div></a>
                    </div>

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login') || Route::has('register'))
                    @endif
                @else
                    <div class="text-center d-inline-block">
                        <a href="#" target="_blank" class="fh5co_display_table"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="fh5co_verticle_middle">
                                <img class="rounded-circle" src="/storage/{{Auth::user()->foto}}"
                                style="width: 30px"></img>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/journal/home">Home</a>
                            <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">Profilo</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                @endguest
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -->

    <!--Barra di navigazione-->
    <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
        <div class="container padding_786">
            <nav class="navbar navbar-toggleable-md navbar-light ">
                <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width"/></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/journal/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="blog.html">Blog <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="single.html">Single <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">World <span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                <a class="dropdown-item" href="#">Action in</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton3" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Community<span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                <a class="dropdown-item" href="#">Action in</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="Contact_us.html">Contact <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- -->

    <main class="py-4">
        @yield('content')
    </main>

<!-- Footer -->
    <div class="container-fluid fh5co_footer_bg pb-3">
        <div class="container animate-box">
            <div class="row">
                <div class="col-12 spdp_right py-5"></div>
                <div class="clearfix"></div>

                <!-- Prima colonna footer -->
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="footer_main_title py-3"> Su di noi</div>
                    <div class="footer_sub_about pb-3">
                        IgnorAnsa è più di un semplice sito di notizie: è un esperimento sociale. Il suo scopo
                        è sdoganare il mito secondo cui tutto ciò che esiste sul web è vero.
                    </div>
                    <div class="footer_mediya_icon">
                        <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                            </a></div>
                        <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                            </a></div>
                        <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                            </a></div>
                    </div>
                </div>
                <!-- -->

                <!-- Seconda colonna footer -->
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="footer_main_title py-3"> Categorie</div>
                    <ul class="footer_menu">
                        <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Business</a></li>
                        <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Entertainment</a></li>
                        <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Environment</a></li>
                        <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Health</a></li>
                        <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Life style</a></li>
                        <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Politics</a></li>
                        <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Technology</a></li>
                        <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; World</a></li>
                    </ul>
                </div>
                <!-- -->

                <!-- Terza colonna foooter -->
                <div class="col-12 col-md-5 col-lg-4 position_footer_relative">
                    <div class="footer_main_title py-3"> Post popolari</div>
                    <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                    <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                    <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                    <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                    <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                    <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                </div>
                <!-- -->

            </div>

            <!-- Campo di registrazione -->
            <div class="row justify-content-center pt-2 pb-4">
                <div class="col-12 col-md-8 col-lg-7 ">
                    <div class="input-group">
                        <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        <input type="text" class="form-control fh5co_footer_text_box" placeholder="email..." aria-describedby="basic-addon1">
                        <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Subscribe</a>
                    </div>
                </div>
            </div>
            <!-- -->

        </div>
    </div>
    <div class="container-fluid fh5co_footer_right_reserved">
        <div class="container">
            <div class="row  ">
                <div class="col-12 col-md-6 py-4 Reserved"> © Copyright 2021, All rights reserved.</div>
                <div class="col-12 col-md-6 spdp_right py-4">
                    <a href="/journal/home" class="footer_last_part_menu">Home</a>
                    <a href="Contact_us.html" class="footer_last_part_menu">About</a>
                    <a href="Contact_us.html" class="footer_last_part_menu">Contact</a>
                    <a href="blog.html" class="footer_last_part_menu">Latest News</a></div>
            </div>
        </div>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>
    <!-- -->

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
            integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
            integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
            crossorigin="anonymous"></script>
    <!-- Waypoints -->
    <script src="/js/jquery.waypoints.min.js"></script>
    <!-- Parallax -->
    <script src="/js/jquery.stellar.min.js"></script>
    <!-- Main -->
    <script src="/js/main.js"></script>
    <script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>
<!-- -->
</body>
</html>
