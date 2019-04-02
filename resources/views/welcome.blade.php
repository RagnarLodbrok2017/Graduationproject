<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('images/welcomeimages/icon.png')}}">


    <title style="font-weight: bold">Recycler </title>
    <link rel="icon" href="{{asset('images/welcomeimages/icon2.png')}}">
{{--<link rel="stylesheet" href="{{asset('css/welcome.css')}}" type="text/css">--}}
<!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}
    <link href='http://fonts.googleapis.com/css?family=Poppins:100,200,300,400,400i,500,600,700%7CMontserrat:700'
          rel='stylesheet' type='text/css'>
    <!-- <link href="css/shader.css" rel="stylesheet" /> -->
    <script src="{{asset('js/welcomejs/jquery-1.11.1.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/welcomecss/sm-clean.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/welcomecss/prettyPhoto.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/welcomecss/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/welcomecss/owl.theme.default.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/welcomecss/shader.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/welcomecss/style.css')}}"/>

</head>
<body>
<div class="site-wrapper">

    <div class="doc-loader">
        <img src="{{asset('images/welcomeimages/preloader.gif')}}" alt="Recycler">
    </div>


    <header class="header-holder">
        <div class="menu-wrapper center-relative relative">
            <div class="header-logo">
                <a href="../">

                    <p class="in-small-screens">Recycler</p>
                    <img src="{{asset('images/welcomeimages/logo-image.png')}}" alt="Recycler">
                    <h4>ecycler</h4>
                </a>
            </div>

            <div class="toggle-holder">
                <div id="toggle" class="">
                    <div class="first-menu-line"></div>
                    <div class="second-menu-line"></div>
                    <div class="third-menu-line"></div>
                </div>
            </div>

            <div class="menu-holder">
                <nav id="header-main-menu">
                    <ul class="main-menu sm sm-clean">
                        <li>
                            <a href="#home">Home</a>
                        </li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li>
                            <a href="#posts">Posts</a>
                        </li>
                        <li>
                            <a href="#posts_carousel">More Posts</a>
                        </li>
                        <li>
                            <a href="#team">Team</a>
                        </li>
                        <li>
                            <a href="#clients">Clients</a>
                        </li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                        @if (Route::has('login'))
                                @auth
                                    <li>
                                    <a href="{{ url('/home') }}">Home</a>
                                    </li>
                                @else
                                    <li>
                                    <a href="{{ route('login') }}">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                        <a href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                @endauth
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="clear"></div>
        </div>
    </header>


    <div id="content" class="site-content center-relative">

        <!--                Home Page Header Background -->
        <div id="home" class="section full-screen full-width">
            <div class="content-header center-relative text-center">
                <h1 class="header"><span>Rec</span>ycler </h1>
                <p>Website</p>
            </div>
            <div id="background-container" class="background-container">
                <div id="background-output" class="background-output"></div>
            </div>

        </div>
        <!--            End Back groud Header -->

        <!-- ********************************************* Services **************************************************-->
        <div id="services" class="section page-split">
            <div class="section-wrapper block content-1170 center-relative">
                <div class="bg-holder float-left">
                    <div class="split-color"></div>
                </div>
                <div class="sticky-spacer">
                    <div class="section-title-holder float-left">
                        <div class="section-top-image">
                            <img src="{{asset('images/welcomeimages/01_left.png')}}" alt="">
                        </div>
                        <h2 class="entry-title">
                            WHAT <br>
                            WE <br>
                            DO
                        </h2>
                        <p class="page-desc">
                            Our modest <br>
                            list of services
                        </p>
                    </div>
                </div>


                <!--                   ************* Section List of the Services  ***************     -->

                <div class="section-content-holder services float-right">
                    <div class="content-wrapper">
                        <div class="info-text">Our list of services to <br> to make you recycle easily</div>
                        <p>&nbsp;</p>

                        <div class="one_half animate">
                            <div class="service-holder">
                                <div class="service-img">
                                    <img src="{{asset('images/welcomeimages/icon_preciese.png')}}" alt="">
                                </div>
                                <div class="service-txt">
                                    <h4>Preciese</h4>
                                    Our services is almost the Best in the world.
                                </div>
                            </div>
                        </div>

                        <div class="one_half last animate">
                            <div class="service-holder">
                                <div class="service-img">
                                    <img src="{{asset('images/welcomeimages/icon_support.png')}}" alt="">
                                </div>
                                <div class="service-txt">
                                    <h4>Support</h4>
                                    We have the newest support services you will see.
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>

                        <div class="one_half animate">
                            <div class="service-holder">
                                <div class="service-img">
                                    <img src="{{asset('images/welcomeimages/icon_responsive.png')}}" alt="">
                                </div>
                                <div class="service-txt">
                                    <h4>Responsive</h4>
                                    We Have a responsive Website opened on all platforms.
                                </div>
                            </div>
                        </div>

                        <div class="one_half last animate">
                            <div class="service-holder">
                                <div class="service-img">
                                    <img src="{{asset('images/welcomeimages/icon_community.png')}}" alt="">
                                </div>
                                <div class="service-txt">
                                    <h4>Community</h4>
                                    We enables you to contact your community .
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>

                        <div class="one_half animate">
                            <div class="service-holder">
                                <div class="service-img">
                                    <img src="{{asset('images/welcomeimages/icon_post.png')}}" alt="">
                                </div>
                                <div class="service-txt">
                                    <h4>Photos</h4>
                                    The Photos have high quality like 4K .
                                </div>
                            </div>
                        </div>

                        <div class="one_half last animate">
                            <div class="service-holder">
                                <div class="service-img">
                                    <img src="{{asset('images/welcomeimages/icon_store.png')}}" alt="">
                                </div>
                                <div class="service-txt">
                                    <h4>Store</h4>
                                    You can buy a ticket for posting without need admin.
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!--            End Services -->

        <!-- *********************************  Posts ******************************* -->
        <div id="posts" class="section page-split">
            <div class="section-wrapper block content-1170 center-relative">
                <div class="bg-holder float-left">
                    <div class="split-color"></div>
                </div>
                <div class="sticky-spacer">
                    <div class="section-title-holder float-left posts-title-fix-class">
                        <div class="section-top-image">
                            <img src="{{asset('images/welcomeimages/02_left.png')}}" alt="">
                        </div>
                        <h2 class="entry-title">
                            OUR<br>POS<br>TS
                        </h2>
                        <p class="page-desc">
                            Check our <br>
                            recent Posts
                        </p>
                    </div>
                </div>

                <div class="section-content-holder float-right">
                    <div class="content-wrapper">
                        <div id="posts-wrapper">
                            <div class="posts-load-content-holder"></div>
                            <div class="grid" id="posts-grid">
                                <div class="grid-sizer"></div>

                                <div id="p-item-1" class="grid-item element-item p_one">
                                    <a class="item-link ajax-posts" href="posts-1.html" data-id="1">
                                        <img src="{{asset('images/welcomeimages/img_01s.jpg')}}" alt="">
                                        <div class="posts-text-holder">
                                            <p class="posts-title">Ahmed Ortega</p>
                                            <p class="posts-desc">PLASTIC CHAIR</p>
                                        </div>
                                    </a>
                                </div>

                                <div id="p-item-2" class="grid-item element-item p_one_half">
                                    <a class="item-link ajax-posts" href="posts-2.html" data-id="2">
                                        <img src="{{asset('images/welcomeimages/img_02s.jpg')}}" alt="">
                                        <div class="posts-text-holder">
                                            <p class="posts-title">Omar Hamza </p>
                                            <p class="posts-desc">PAPERS</p>
                                        </div>
                                    </a>
                                </div>

                                <div id="p-item-3" class="grid-item element-item p_one_half">
                                    <a class="item-link ajax-posts" href="posts-3.html" data-id="3">
                                        <img src="{{asset('images/welcomeimages/img_10s.jpg')}}" alt="">
                                        <div class="posts-text-holder">
                                            <p class="posts-title">Omar Hamza</p>
                                            <p class="posts-desc">PAPERS</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="grid-item element-item p_one_half">
                                    <a class="item-link" href="{{asset('images/welcomeimages/img_05s.jpg')}}"
                                       data-rel="prettyPhoto[posts]">
                                        <img src="{{asset('images/welcomeimages/img_11s.jpg')}}" alt="">
                                        <div class="posts-text-holder">
                                            <p class="posts-title">Omar Hamza</p>
                                            <p class="posts-desc">PAPERS</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="grid-item element-item p_one">
                                    <a class="item-link" href="https://www.youtube.com/watch?v=15cpIHjEsWI"
                                       data-rel="prettyPhoto[posts]">
                                        <img src="{{asset('images/welcomeimages/img_12s.jpg')}}" alt="">
                                        <div class="posts-text-holder">
                                            <p class="posts-title">Omar Hamza</p>
                                            <p class="posts-desc">PAPERS</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="block center-relative center-text more-posts-posts-holder">
                            <a class="more-posts-posts">
                                <img src="{{asset('images/welcomeimages/icon_plus.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- ******************************* posts_carousel ************************************ -->
        <div id="posts_carousel" class="section full-screen full-width">
            <div class="section-wrapper block content-1170 center-relative">
                <div class="content-wrapper">
                    <script>
                        var slider1_speed = "2000";
                        var slider1_auto = "true";
                        var slider1_hover = "true";
                    </script>
                    <div class="image-slider-wrapper relative">
                        <div id="slider1" class="owl-carousel owl-theme image-slider slider">
                            <div class="owl-item">
                                <a href="#services" class="scroll">
                                    <div class="section-content-holder float-left">
                                        <div class="content-wrapper">
                                            <p>&nbsp;</p>
                                            <a class="video-popup-holder"
                                               href="https://www.youtube.com/watch?v=15cpIHjEsWI"
                                               data-rel="prettyPhoto[gallery-video1]">
                                                <img class="thumb" src="{{asset('images/welcomeimages/chair1.jpg')}}"
                                                     alt="">
                                                <img class="popup-play"
                                                     src="{{asset('images/welcomeimages/play_btn.png')}}" alt="Play">
                                            </a>
                                            <p>&nbsp;</p>

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="section-content-holder2">
                                        <div class="content-wrapper">
                                            <p>&nbsp;</p>
                                            <h3> PLASTIC Chair</h3>
                                            <p><span>Posted By : </span>Hazem Emam</p>
                                            <p>this is a plastic chair you<br> can restore it in our website</p>
                                            <p>&nbsp;</p>

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="#services" class="scroll">
                                    <div class="section-content-holder float-left">
                                        <div class="content-wrapper">
                                            <p>&nbsp;</p>
                                            <a class="video-popup-holder"
                                               href="https://www.youtube.com/watch?v=15cpIHjEsWI"
                                               data-rel="prettyPhoto[gallery-video1]">
                                                <img class="thumb" src="{{asset('images/welcomeimages/paper1.jpg')}}"
                                                     alt="">
                                                <img class="popup-play"
                                                     src="{{asset('images/welcomeimages/play_btn.png')}}" alt="Play">
                                            </a>
                                            <p>&nbsp;</p>

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="section-content-holder2">
                                        <div class="content-wrapper">
                                            <p>&nbsp;</p>
                                            <h3> PAPERS </h3>
                                            <p><span>Posted By : </span>Hazem Emam</p>
                                            <p>this is a paper you<br> can restore it in our website</p>
                                            <p>&nbsp;</p>

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="#services" class="scroll">
                                    <div class="section-content-holder float-left">
                                        <div class="content-wrapper">
                                            <p>&nbsp;</p>
                                            <a class="video-popup-holder"
                                               href="https://www.youtube.com/watch?v=15cpIHjEsWI"
                                               data-rel="prettyPhoto[gallery-video1]">
                                                <img class="thumb" src="{{asset('images/welcomeimages/chair2.jpg')}}"
                                                     alt="">
                                                <img class="popup-play"
                                                     src="{{asset('images/welcomeimages/play_btn.png')}}" alt="Play">
                                            </a>
                                            <p>&nbsp;</p>

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="section-content-holder2">
                                        <div class="content-wrapper">
                                            <p>&nbsp;</p>
                                            <h3> PLASTIC Chair</h3>
                                            <p><span>Posted By : </span>Hazem Emam</p>
                                            <p>this is a plastic chair you<br> can restore it in our website</p>
                                            <p>&nbsp;</p>

                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Team -->
        <div id="team" class="section page-split">
            <div class="section-wrapper block content-1170 center-relative">
                <div class="bg-holder float-left">
                    <div class="split-color"></div>
                </div>
                <div class="sticky-spacer">
                    <div class="section-title-holder float-left">
                        <div class="section-top-image">
                            <img src="{{asset('images/welcomeimages/03_right.png')}}" alt="">
                        </div>
                        <h2 class="entry-title">
                            MEET <br>OUR <br>TEAM
                        </h2>
                        <p class="page-desc">
                            Get to know us <br>
                            much better
                        </p>
                    </div>
                </div>

                <div class="section-content-holder float-right">
                    <div class="content-wrapper">
                        <div id="team-holder">
                            <div class="team-load-content-holder"></div>
                            <ul class="member-holder-wrapper">

                                <li id="team-member-1" class="member-holder one_half">
                                    <a class="img-link ajax-member-content" href="team-1.html" data-id="1">
                                        <img class="attachment-post-thumbnail"
                                             src="{{asset('images/welcomeimages/team-22.jpg')}}" alt="">
                                        <div class="member-mask">
                                            <div class="member-info-holder">
                                                <p class="member-leader">TEAM LEADER</p>
                                                <p class="member-name">Ahmed Rezk Mohamed</p>
                                                <p class="member-position">Full Stack Web Developer</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li id="team-member-2" class="member-holder one_half">
                                    <a class="img-link ajax-member-content" href="team-2.html" data-id="2">
                                        <img class="attachment-post-thumbnail"
                                             src="{{asset('images/welcomeimages/team-10.jpg')}}" alt="">
                                        <div class="member-mask">
                                            <div class="member-info-holder">
                                                <p class="member-name">Abdo Nabil</p>
                                                <p class="member-position">DESIGNER</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li id="team-member-3" class="member-holder one_half">
                                    <a class="img-link ajax-member-content" href="team-3.html" data-id="3">
                                        <img class="attachment-post-thumbnail"
                                             src="{{asset('images/welcomeimages/team-8.jpg')}}" alt="">
                                        <div class="member-mask">
                                            <div class="member-info-holder">
                                                <p class="member-name">Mohamed Abdallah</p>
                                                <p class="member-position">CODER</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li id="team-member-4" class="member-holder one_half">
                                    <a class="img-link ajax-member-content" href="team-4.html" data-id="4">
                                        <img class="attachment-post-thumbnail"
                                             src="{{asset('images/welcomeimages/team-6.jpg')}}" alt="">
                                        <div class="member-mask">
                                            <div class="member-info-holder">
                                                <p class="member-name">Hager Elgebaly</p>
                                                <p class="member-position">HR</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li id="team-member-5" class="member-holder one_half">
                                    <a class="img-link ajax-member-content" href="team-5.html" data-id="5">
                                        <img class="attachment-post-thumbnail"
                                             src="{{asset('images/welcomeimages/team-9.jpg')}}" alt="">
                                        <div class="member-mask">
                                            <div class="member-info-holder">
                                                <p class="member-name">Hussin soliman</p>
                                                <p class="member-position">DESIGNER</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>


        <!-- *****************************************  Clients **********************************************  -->
        <div id="clients" class="section full-width">
            <div class="section-wrapper block content-1170 center-relative">
                <div class="content-wrapper">
                    <div class="one_half">
                        <script>
                            var textSlider1_speed = "2000";
                            var textSlider1_auto = "true";
                            var textSlider1_hover = "true";
                        </script>
                        <div class="text-slider-wrapper relative">
                            <div class="text-slider-header-quotes"></div>

                            <div id="textSlider1" class="text-slider slider owl-carousel owl-theme">

                                <div class="text-slide">
                                    <p class="text-slide-content">
                                        A very small stage in a vast cosmic arena are creatures of the cosmos vanquish
                                        the impossible white dwarf astonishment. A still more glorious dawn awaits
                                        light.
                                    </p>
                                    <img class="text-slide-img"
                                         src="{{asset('images/welcomeimages/testiomonial_img_01.jpg')}}" alt=""/>
                                    <p class="text-slide-name">Mohamed Essam</p>
                                    <p class="text-slide-position">VIP</p>
                                </div>

                                <div class="text-slide">
                                    <p class="text-slide-content">
                                        Globular star cluster, another world brain is the seed of intelligence a billion
                                        trillion bits of moving fluff hearts of the stars. Hypatia preserve and cherish
                                        that pale blue dot.
                                    </p>
                                    <img class="text-slide-img"
                                         src="{{asset('images/welcomeimages/testiomonial_img_02.jpg')}}" alt=""/>
                                    <p class="text-slide-name">Ahmed Emad</p>
                                    <p class="text-slide-position">VIP</p>
                                </div>

                                <div class="text-slide">
                                    <p class="text-slide-content">
                                        Hypatia preserve and cherish that pale blue dot. Hundreds of thousands!
                                        Inconspicuous motes of rock and gas the carbon in our apple pies creatures of
                                        the cosmos.
                                    </p>
                                    <img class="text-slide-img"
                                         src="{{asset('images/welcomeimages/testiomonial_img_03.jpg')}}" alt=""/>
                                    <p class="text-slide-name">Mona Ahmed</p>
                                    <p class="text-slide-position">VIP</p>
                                </div>

                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>


                    <div class="one_fourth top-80">
                        <img src="{{asset('images/welcomeimages/client_logo_01.png')}}" alt=""
                             class="bottom-25 aligncenter">
                        <img src="{{asset('images/welcomeimages/client_logo_05.png')}}" alt=""
                             class="bottom-25 aligncenter">
                        <img src="{{asset('images/welcomeimages/client_logo_02.png')}}" alt=""
                             class="bottom-25 aligncenter">
                    </div>

                    <div class="one_fourth last top-80">
                        <img src="{{asset('images/welcomeimages/client_logo_06.png')}}" alt=""
                             class="bottom-25 aligncenter">
                        <img src="{{asset('images/welcomeimages/client_logo_03.png')}}" alt=""
                             class="bottom-25 aligncenter">
                        <img src="{{asset('images/welcomeimages/client_logo_04.png')}}" alt=""
                             class="bottom-25 aligncenter">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- Contact -->
        <div id="contact" class="section page-split">
            <div class="section-wrapper block content-1170 center-relative">
                <div class="bg-holder float-left">
                    <div class="split-color"></div>
                </div>
                <div class="sticky-spacer">
                    <div class="section-title-holder float-left">
                        <div class="section-top-image">
                            <img src="{{asset('images/welcomeimages/04_right.png')}}" alt="">
                        </div>
                        <h2 class="entry-title">
                            STAY <br>IN <br>TOUCH
                        </h2>
                        <p class="page-desc">
                            Use contact <br>
                            form on the right
                        </p>
                    </div>
                </div>

                <div class="section-content-holder float-right">
                    <div class="content-wrapper">
                        <div class="info-text">
                            You can contact us if you have <br>
                            amy problem or any discussion
                        </div>
                        <p>&nbsp;</p>

                        <div class="contact-form">
                            <p><input id="name" type="text" name="your-name" placeholder="Name"></p>
                            <p><input id="contact-email" type="email" name="your-email" placeholder="Email"></p>
                            <p><input id="subject" type="text" name="your-subject" placeholder="Subject"></p>
                            <p><textarea id="message" name="your-message" placeholder="Message"></textarea></p>
                            <p class="contact-submit-holder"><input type="submit" onClick="SendMail()" value="SEND"></p>
                        </div>

                        <p>&nbsp;</p>

                        <div class="one_half">
                            Egypt is a Mediterranean country bordered by the Gaza Strip and Israel to the northeast, the
                            Gulf of Aqaba and the Red Sea to the east.
                        </div>

                        <div class="one_half last">
                            Phone: 01158560343 <br>
                            E-mail: ahmedrmohamed2017@gmail.com <br>
                            Website: www.recycler.com <br>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- footer -->
        <div id="milestones" class="section full-width">
            <div class="section-wrapper block content-1170 center-relative">
                <div class="content-wrapper">
                    <ul class="milestones-holder">
                        <li class="milestone">
                            <p class="milestone-num">50</p>
                            <p class="milestone-text">
                                Number of <br>
                                Users in Rec
                            </p>
                        </li>
                        <li class="milestone">
                            <p class="milestone-num">244</p>
                            <p class="milestone-text">
                                Number of Posts in Rec
                            </p>
                        </li>
                        <li class="milestone">
                            <p class="milestone-num">62k</p>
                            <p class="milestone-text">
                                Number of Likes in Rec
                            </p>
                        </li>
                        <li class="milestone">
                            <p class="milestone-num">30k</p>
                            <p class="milestone-text">
                                Number of Comments <br>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>


    <!-- *********************************  Footer *********************************************8 -->
    <footer class="footer">
        <div class="footer-content center-relative">


            <div class="social-holder">
                <a href="#">
                    <span class="fa fa-twitter"></span>
                </a>
                <a href="#">
                    <span class="fa fa-facebook"></span>
                </a>
                <a href="#">
                    <span class="fa fa-behance"></span>
                </a>
                <a href="#">
                    <span class="fa fa-dribbble"></span>
                </a>
            </div>

            <div class="copyright-holder">
                @ 2018 Created This Template by <a
                    href="https://www.facebook.com/AhmedR.Mohamed2016"><span>Ortega</span></a>
            </div>
        </div>
    </footer>
</div>

{{--<div class="flex-center position-ref full-height">--}}
{{--@if (Route::has('login'))--}}
{{--<div class="top-right links">--}}
{{--@auth--}}
{{--<a href="{{ url('/home') }}">Home</a>--}}
{{--@else--}}
{{--<a href="{{ route('login') }}">Login</a>--}}

{{--@if (Route::has('register'))--}}
{{--<a href="{{ route('register') }}">Register</a>--}}
{{--@endif--}}
{{--@endauth--}}
{{--</div>--}}
{{--@endif--}}

{{--<div class="content">--}}
{{--<div class="title m-b-md">--}}
{{--Recycler--}}
{{--</div>--}}

{{--<div class="links">--}}
{{--<a href="https://laravel.com/docs">Docs</a>--}}
{{--<a href="https://laracasts.com">Laracasts</a>--}}
{{--<a href="https://laravel-news.com">News</a>--}}
{{--<a href="https://blog.laravel.com">Blog</a>--}}
{{--<a href="https://nova.laravel.com">Nova</a>--}}
{{--<a href="https://forge.laravel.com">Forge</a>--}}
{{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="content" id="app">--}}
{{--<b-alert variant="success" show>Success Alert</b-alert>--}}
{{--<b-alert show>Hello</b-alert>--}}
{{--<example-component></example-component>--}}

{{--</div>--}}
<!--Load JavaScript-->
<script src="{{asset('js/welcomejs/jquery.js')}}"></script>
<script src="{{asset('js/welcomejs/jquery.sticky.js')}}"></script>
<script src='{{asset('js/welcomejs/imagesloaded.pkgd.js')}}'></script>
<script src='{{asset('js/welcomejs/jquery.fitvids.js')}}'></script>
<script src='{{asset('js/welcomejs/jquery.smartmenus.min.js')}}'></script>
<script src='{{asset('js/welcomejs/isotope.pkgd.js')}}'></script>
<script src='{{asset('js/welcomejs/jquery.easing.1.3.js')}}'></script>
<script src='{{asset('js/welcomejs/jquery.prettyPhoto.js')}}'></script>
<script src='{{asset('js/welcomejs/owl.carousel.min.js')}}'></script>
<script src='{{asset('js/welcomejs/jquery.sticky-kit.min.js')}}'></script>
<script src="{{asset('js/welcomejs/flat-surface-shader.js')}}"></script>
<script src="{{asset('js/welcomejs/shader.js')}}"></script>
{{--<script type="text/javascript" src="../js/app.js"></script>--}}
<script src='{{asset('js/welcomejs/main.js')}}'></script>

</body>
</html>
