<!DOCTYPE html>
<html lang="en">

<head>
    <title>Peter's Place Hotel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" media="all"/>
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" media="all"/>
    <link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('css/easy-responsive-tabs.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('css/flexslider.css') }}" rel="stylesheet" media="screen" property=""/>
    <link href="{{ URL::asset('css/chocolat.css') }}" rel="stylesheet" media="screen"/>
    <link href="{{ URL::asset('css/jquery-ui.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('css/swipebox.css') }}" rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Federo&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>

    <script src="{{ URL::asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ URL::asset('js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap-3.1.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.swipebox.min.js') }}"></script>
    <script src="{{ URL::asset('js/move-top.js') }}"></script>
    <script src="{{ URL::asset('js/easing.js') }}"></script>
    <script src="{{ URL::asset('js/responsiveslides.min.js') }}"></script>
    <script src="{{ URL::asset('js/easy-responsive-tabs.js') }}"></script>
    <script defer src="{{ URL::asset('js/jquery.flexslider.js') }}"></script>

    <script>
        jQuery(function ($) {
            $(".swipebox").swipebox();
        });
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html, body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>

    <script>
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",

                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>

    <script>
        $(function () {
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",

                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },

                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default',
                width: 'auto',
                fit: true,
                closed: 'accordion',

                activate: function (event) {
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });

            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });
    </script>

    <script>
        $(function () {
            $("#datepicker, #datepicker1, #datepicker2, #datepicker3").datepicker();
        });
    </script>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
</head>

<body>
<div class="banner-top" id="home">
    <div class="col-sm-6">
        <div class="social-bnr-agileits">
            <ul class="social-icons3">
                <li>
                    <a href="https://www.facebook.com/petersplace.hiriketiya/"
                       class="fa fa-facebook icon-border facebook" target=_blank></a>
                </li>

                <div class="contact-bnr-w3-agile">
                    <ul>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>info@petersplace.lk</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>+94 (41)225-74-66</li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="top-right links">
            <a href="{{ url('/login') }}">Sign in</a>
        </div>
    </div>

    <div class="clearfix"></div>
</div>

<div class="w3_navigation">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <h1>
                    <a class="navbar-brand" href="#home">
                        Peter's <span>Place</span>
                        <p class="logo_w3l_agile_caption">Your Dreamy Resort</p>
                    </a>
                </h1>
            </div>

            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav class="menu menu--iris">
                    <ul class="nav navbar-nav menu__list">
                        <li class="menu__item menu__item--current"><a href="#home" class="menu__link">Home</a></li>
                        <li class="menu__item"><a href="#about" class="menu__link scroll">About Us</a></li>
                        <li class="menu__item"><a href="#gallery" class="menu__link scroll">Gallery</a></li>
                        <li class="menu__item"><a href="#rooms" class="menu__link scroll">Accomodation</a></li>
                        <li class="menu__item"><a href="{{ url('/online_reservation') }}">Room Reservation</a></li>
                        <li class="menu__item"><a href="#contact" class="menu__link scroll">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>

<div id="home" class="w3ls-banner">
    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides callbacks callbacks1" id="slider4">
                <li>
                    <div class="w3layouts-banner-top">
                        <div class="container">
                            <div class="agileits-banner-info">
                                <h4>Peter's Place</h4>
                                <h3>We know what you love</h3>
                                <p>Welcome to our hotel</p>

                                <div class="agileits_w3layouts_more menu__item">
                                    <a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="w3layouts-banner-top w3layouts-banner-top1">
                        <div class="container">
                            <div class="agileits-banner-info">
                                <h4>Peter's Place</h4>
                                <h3>Stay with your friends & families</h3>
                                <p>Come & enjoy precious moments with us</p>

                                <div class="agileits_w3layouts_more menu__item">
                                    <a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="w3layouts-banner-top w3layouts-banner-top2">
                        <div class="container">
                            <div class="agileits-banner-info">
                                <h4>Peter's Place</h4>
                                <h3>Want a luxurious vacation?</h3>
                                <p>Get accommodation today</p>

                                <div class="agileits_w3layouts_more menu__item">
                                    <a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>

    </div>
    <div class="thim-click-to-bottom">
        <a href="#about" class="scroll">
            <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
        </a>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4>
                    Peter's <span>Place</span>
                </h4>

                <img src="{{ asset('images/1.jpg') }}" alt="hotel_img" class="img-responsive">

                <h5>We know what you love</h5>

                <p>Providing guests unique and enchanting views from their rooms with its exceptional amenities,
                    makes
                    Peter's Place Hotel one of the best in its kind in Sri Lanka. Try our food menu, awesome
                    services
                    and friendly staff while you are here.</p>
            </div>
        </div>
    </div>
</div>

<div class="banner-bottom">
    <div class="container">
        <div class="agileits_banner_bottom">
            <h3>
                <span>Experience a good stay, enjoy fantastic offers</span>
                Find our friendly welcoming reception
            </h3>
        </div>

        <div class="w3ls_banner_bottom_grids">
            <ul class="cbp-ig-grid">
                <li>
                    <div class="w3_grid_effect">
                        <span class="cbp-ig-icon w3_road"></span>
                        <h4 class="cbp-ig-title">Master Bedrooms</h4>
                        <span class="cbp-ig-category">Peter's Place</span>
                    </div>
                </li>

                <li>
                    <div class="w3_grid_effect">
                        <span class="cbp-ig-icon w3_cube"></span>
                        <h4 class="cbp-ig-title">Sea View Balcony</h4>
                        <span class="cbp-ig-category">Peter's Place</span>
                    </div>
                </li>

                <li>
                    <div class="w3_grid_effect">
                        <span class="cbp-ig-icon w3_users"></span>
                        <h4 class="cbp-ig-title">Large Cafe</h4>
                        <span class="cbp-ig-category">Peter's Place</span>
                    </div>
                </li>

                <li>
                    <div class="w3_grid_effect">
                        <span class="cbp-ig-icon w3_ticket"></span>
                        <h4 class="cbp-ig-title">Wifi Coverage</h4>
                        <span class="cbp-ig-category">Peter's Place</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="about-wthree" id="about">
    <div class="container">
        <div class="ab-w3l-spa">
            <h3 class="title-w3-agileits title-black-wthree">About Peter's Place Hotel</h3>

            <p class="about-para-w3ls">
                Providing guests unique and enchanting views from their rooms with its exceptional amenities, makes
                Peter's Place
                Hotel one of the best in its kind in Sri Lanka. It is situated beside the beautiful south coast of
                Hiriketiya in
                Dikwella, Matara.
                <br/><br/>
                Hiriketiya bay beach is a hidden gem in south coast of Sri Lanka. Also known as Hiri Beach, it is
                one of
                those sleepy Southern beaches, beautifully clear water, lots of greeny small beach with great
                surfing,
                located in the Hiriketiya Bay, which is a 500m beautiful horseshoe shaped cove. It is unique in
                shape
                and topography making surf available approximately ten months of the year.
                <br/><br/>
                During peak holiday seasons from Dec-Feb smaller swells from the west create a perfect beginners
                beach
                break wave and the occasional ride on the left point break. Surf films, photos, travel, culture,
                characters, coaching & news brought to you by your friends at Surf Simply. We are a community of
                surfing
                enthusiasts with a passion for surfing. Our intention is to create a fun, loving, and safe surfing
                experience.
                <br/><br/>
                Peter's place provides you a delicious Sri Lankan and Italian foods and beverages. Try our food
                menu,
                awesome
                services and friendly staff while you are here.
            </p>
        </div>
    </div>
</div>

<div class="advantages">
    <div class="container">
        <div class="advantages-main">
            <h3 class="title-w3-agileits">Our Services</h3>

            <div class="advantage-bottom">
                <div class="col-md-6 advantage-grid left-w3ls wow bounceInLeft" data-wow-delay="0.3s">
                    <div class="advantage-block ">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>

                        <h4>Stay First, Pay After!</h4>

                        <p>You can complete your payment only on check out. No need to pay an advance when reserving
                            rooms.</p>

                        <p><i class="fa fa-check" aria-hidden="true"></i>Decorated rooms, proper air conditioned</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>Private balcony</p>
                    </div>
                </div>

                <div class="col-md-6 advantage-grid right-w3ls wow zoomIn" data-wow-delay="0.3s">
                    <div class="advantage-block">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>

                        <h4>Friendly Staff, 24 Hour Service</h4>

                        <p>Our friendly staff are commited to provide all the services required to our guests at any
                            time of the day.</p>

                        <p><i class="fa fa-check" aria-hidden="true"></i>24 hours room service</p>
                        <p><i class="fa fa-check" aria-hidden="true"></i>24-hour concierge service</p>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<section class="portfolio-w3ls" id="gallery">
    <h3 class="title-w3-agileits title-black-wthree">Gallery</h3>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g1.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g1.jpg') }}" class="img-responsive" alt="g1">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g2.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g2.jpg') }}" class="img-responsive" alt="g2">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g3.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g3.jpg') }}" class="img-responsive" alt="g3">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g4.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g4.jpg') }}" class="img-responsive" alt="g4">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g5.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g5.jpg') }}" class="img-responsive" alt="g5">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g6.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g6.jpg') }}" class="img-responsive" alt="g6">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g7.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g7.jpg') }}" class="img-responsive" alt="g7">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g8.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g8.jpg') }}" class="img-responsive" alt="g8">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g9.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g9.jpg') }}" class="img-responsive" alt="g9">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g10.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g10.jpg') }}" class="img-responsive" alt="g10">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g11.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g11.jpg') }}" class="img-responsive" alt="g11">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g12.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g12.jpg') }}" class="img-responsive" alt="g12">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g13.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g13.jpg') }}" class="img-responsive" alt="g13">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g14.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g14.jpg') }}" class="img-responsive" alt="g14">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g15.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g15.jpg') }}" class="img-responsive" alt="g15">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g16.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g16.jpg') }}" class="img-responsive" alt="g16">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g17.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g17.jpg') }}" class="img-responsive" alt="g17">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g18.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g18.jpg') }}" class="img-responsive" alt="g18">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g19.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g19.jpg') }}" class="img-responsive" alt="g19">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g20.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g20.jpg') }}" class="img-responsive" alt="g20">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g21.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g21.jpg') }}" class="img-responsive" alt="g21">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g22.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g22.jpg') }}" class="img-responsive" alt="g22">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g23.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g23.jpg') }}" class="img-responsive" alt="g23">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="col-md-3 gallery-grid gallery1">
        <a href="{{ asset('images/g24.jpg') }}" class="swipebox">
            <img src="{{ asset('images/g24.jpg') }}" class="img-responsive" alt="g24">

            <div class="textbox">
                <h4>Peter's Place</h4>
                <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
            </div>
        </a>
    </div>

    <div class="clearfix"></div>
</section>

<div class="plans-section" id="rooms">
    <div class="container">
        <h3 class="title-w3-agileits title-black-wthree">Accomodation</h3>

        <div class="priceing-table-main">
            <div class="col-sm-4 price-grid">
                <div class="price-block agile">
                    <div class="price-gd-top">
                        <img src="{{ asset('images/r1.jpg') }}" alt="single" class="img-responsive"/>
                        <h4>Single Bedroom</h4>
                    </div>

                    <div class="price-gd-bottom">
                        <div class="price-list">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>

                        <div class="price-selet">
                            <h3><span>LKR</span>2000</h3>
                            <a href="{{ url('/online_reservation') }}">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 price-grid">
                <div class="price-block agile">
                    <div class="price-gd-top">
                        <img src="{{ asset('images/r2.jpg') }}" alt="double" class="img-responsive"/>
                        <h4>Double Bedroom</h4>
                    </div>

                    <div class="price-gd-bottom">
                        <div class="price-list">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>

                        <div class="price-selet">
                            <h3><span>LKR</span>4000</h3>
                            <a href="{{ url('/online_reservation') }}">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 price-grid">
                <div class="price-block agile">
                    <div class="price-gd-top">
                        <img src="{{ asset('images/r3.jpg') }}" alt="family" class="img-responsive"/>
                        <h4>Family Bedroom</h4>
                    </div>

                    <div class="price-gd-bottom">
                        <div class="price-list">
                            <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>

                        <div class="price-selet">
                            <h3><span>LKR</span>7500</h3>
                            <a href="{{ url('/online_reservation') }}">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="book">
                <a href="{{ url('/online_reservation') }}" class="myButton">BOOK NOW!</a>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<footer>
    <section id="contact">
        <div class="container">
            <div>
                <div class="col-sm-2" id="footer_list">
                    <div class="unordered_list">
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#rooms">Accomodation</a></li>
                            <li><a href="{{ url('/online_reservation') }}">Room Reservation</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6" id="about_footer">
                    <h2>Peter's Place</h2>
                    <br/>

                    <p>
                        Providing guests unique and enchanting views from their rooms with its exceptional
                        amenities,
                        makes Peter's
                        Place Hotel one of the best in its kind in Sri Lanka.
                        <br/>
                        Peter's place provides you a delicious Sri Lankan and Italian foods and beverages.
                        Try our food menu, awesome services and friendly staff while you are here.
                    </p>
                </div>

                <div class="col-sm-4" id="contact_us">
                    <h2>Contact Us</h2>
                    <br/>

                    <div>
                        <h3>
                            <i class="fa fa-map"></i>
                            <p>Peter's Place Hotel, Hiriketiya, Dickwella, Matara</p>
                        </h3>
                        <br/>
                    </div>

                    <div>
                        <h3>
                            <i class="fa fa-phone"></i>
                            <p>+94 (41)225-74-66</p>
                        </h3>
                        <br/>
                    </div>

                    <div>
                        <h3>
                            <i class="fa fa-envelope"></i>
                            <p>info@petersplace.lk</p>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="copy">
        <p>© 2019 Peter's Place . All Rights Reserved</p>
    </div>

    <div class="clearfix"></div>
</footer>

<div class="arr-w3ls">
    <a href="#home" id="toTop">
        <span id="toTopHover"></span>
    </a>
</div>
</body>

</html>
