<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="icon" sizes="16x16" href="{{asset('images/AdminDashboardImages/images/icon.png')}}">
    <title>Recycler</title>
    <!-- Custom CSS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{asset('libraries/AdminDashboardLibs/libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('libraries/AdminDashboardLibs/libs/css-chart/css-chart.css')}}" rel="stylesheet">
    <link href="{{asset('libraries/AdminDashboardLibs/libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="{{asset('css/AdminDashboardCss/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/AdminDashboardCss/css/chatlist.css')}}" rel="stylesheet">
    <!-- <link href="../../dist/css/cryptoicons.css" rel="stylesheet"> -->
    <link href="{{asset('css/AdminDashboardCss/css/fontawesomeicons.css')}}" rel="stylesheet">
    <link href="{{asset('css/AdminDashboardCss/css/materialdesignicons.css')}}" rel="stylesheet">
    <!-- <link href="../../dist/css/notimportant.css" rel="stylesheet"> -->
    <link href="{{asset('css/AdminDashboardCss/css/simplelineicons.css')}}" rel="stylesheet">
    <link href="{{asset('css/AdminDashboardCss/css/themifyicons.css')}}" rel="stylesheet">
    <link href="{{asset('css/AdminDashboardCss/css/weathericons.css')}}" rel="stylesheet">
    <link href="{{asset('css/AdminDashboardCss/css/bootstrap.css')}}" rel="stylesheet">
    <!-- <link href="../../dist/css/notimportant.css" rel="stylesheet"> -->
    <link href="{{asset('css/AdminDashboardCss/css/style.css')}}" rel="stylesheet">

</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- ********************************* Topbar header ********************************** -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="javascript:void(0)" style="padding-top: 20px; padding-left: 15px">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!-- <img src="images/logo-light-icon.ico" alt="homepage" class="light-logo" /> -->
                        <h1 style="color: #FFA962">R</h1>
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
              <h2 style="letter-spacing: 5px">ecycler</h2>
            </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                   aria-expanded="false"
                   aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                                                              href="javascript:void(0)" data-sidebartype="mini-sidebar"><i
                                class="mdi mdi-menu font-24"></i></a></li>
                    <!-- ============================================================== -->


                    <!-- menu on navbar -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown mega-dropdown"><a
                            class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-md-block">Rules <i class="fa fa-angle-down"></i></span>
                            <span class="d-block d-md-none"><i class="mdi mdi-dialpad font-24"></i></span>
                        </a>
                        <div class="dropdown-menu animated bounceInDown">
                            <div class="mega-dropdown-menu row">
                                <div class="col-lg-3 col-xlg-2 m-b-30">
                                    <h4 class="m-b-20">CAROUSEL</h4>
                                    <!-- CAROUSEL -->
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <div class="container p-0"><img class="d-block img-fluid"
                                                                                src="{{asset('images/AdminDashboardImages/images/big/img1.jpg')}}"
                                                                                alt="First slide"></div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container p-0"><img class="d-block img-fluid"
                                                                                src="{{asset('images/AdminDashboardImages/images/big/img2.jpg')}}"
                                                                                alt="Second slide"></div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="container p-0"><img class="d-block img-fluid"
                                                                                src="{{asset('images/AdminDashboardImages/images/big/img3.jpg')}}"
                                                                                alt="Third slide"></div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                           data-slide="prev"> <span class="carousel-control-prev-icon"
                                                                    aria-hidden="true"></span> <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                           data-slide="next"> <span class="carousel-control-next-icon"
                                                                    aria-hidden="true"></span> <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <!-- End CAROUSEL -->
                                </div>
                                <div class="col-lg-3 m-b-30">
                                    <h4 class="m-b-20">Rights</h4>
                                    <!-- Accordian -->
                                    <div id="accordion">
                                        <div class="card m-b-5">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse"
                                                            data-target="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne">
                                                        Rule #1
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    This is the Admin Panel You can control all the website
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card m-b-5">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                        Collapsible Group Item #2
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card m-b-5">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree">
                                                        Collapsible Group Item #3
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                 data-parent="#accordion">
                                                <div class="card-body">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                                    terry.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3  m-b-30">
                                    <h4 class="m-b-20">Send Mail</h4>
                                    <!-- Contact -->
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputname1"
                                                   placeholder="Enter Name"></div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter email"></div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="exampleTextarea" rows="3"
                                                      placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-xlg-4 m-b-30">
                                    <h4 class="m-b-20">List style</h4>
                                    <!-- List style -->
                                    <ul class="list-style-none">
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You
                                                can give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give
                                                link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                Another Give link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth
                                                link</a></li>
                                        <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>
                                                Another fifth link</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End mega menu -->
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- **************** Search  ***************************8-->
                    <!-- ============================================================== -->
                    <li class="nav-item search-box"><a class="nav-link waves-effect waves-dark"
                                                       href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search position-absolute">
                            <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                class="srh-btn"><i class="ti-close"></i></a>
                        </form>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- create new -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right  animated bounceInDown"
                             aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a>
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a>
                            <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
                        </div>
                    </li>
                    <!-- ============================================================== -->


                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                            <span class="with-arrow"><span class="bg-primary"></span></span>
                            <ul class="list-style-none">
                                <li>
                                    <div class="drop-title bg-primary text-white">
                                        <h4 class="m-b-0 m-t-5">4 New</h4>
                                        <span class="font-light">Notifications</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-center notifications">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                            <div class="mail-contnet">
                                                <h5 class="message-title">Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span>
                                                <span class="time">9:30 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                            <div class="mail-contnet">
                                                <h5 class="message-title">Event today</h5> <span class="mail-desc">Just a reminder that you have event</span>
                                                <span class="time">9:10 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                            <div class="mail-contnet">
                                                <h5 class="message-title">Settings</h5> <span class="mail-desc">You can customize this template as you want</span>
                                                <span class="time">9:08 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                            <div class="mail-contnet">
                                                <h5 class="message-title">Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span>
                                                <span class="time">9:02 AM</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center m-b-5 text-dark" href="javascript:void(0);"> <strong>Check
                                            all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                class="font-24 mdi mdi-comment-processing"></i>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                             aria-labelledby="2">
                            <span class="with-arrow"><span class="bg-danger"></span></span>
                            <ul class="list-style-none">
                                <li>
                                    <div class="drop-title text-white bg-danger">
                                        <h4 class="m-b-0 m-t-5">5 New</h4>
                                        <span class="font-light">Messages</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-center message-body">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img
                                                    src="{{asset('images/AdminDashboardImages/images/users/1.jpg')}}"
                                                    alt="user"
                                                    class="rounded-circle"> <span
                                                    class="profile-status online pull-right"></span> </span>
                                            <div class="mail-contnet">
                                                <h5 class="message-title">Ahmed Ortega</h5> <span class="mail-desc">Just see the my admin!</span>
                                                <span class="time">9:30 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img
                                                    src="{{asset('images/AdminDashboardImages/images/users/2.jpg')}}"
                                                    alt="user"
                                                    class="rounded-circle"> <span
                                                    class="profile-status busy pull-right"></span> </span>
                                            <div class="mail-contnet">
                                                <h5 class="message-title">Abdo Nabil</h5> <span class="mail-desc">I've sung a song! See you at</span>
                                                <span class="time">9:10 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img
                                                    src="{{asset('images/AdminDashboardImages/images/users/3.jpg')}}"
                                                    alt="user"
                                                    class="rounded-circle"> <span
                                                    class="profile-status away pull-right"></span> </span>
                                            <div class="mail-contnet">
                                                <h5 class="message-title">Mohamed Abdallah</h5> <span class="mail-desc">I am a singer!</span>
                                                <span class="time">9:08 AM</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="message-item">
                                            <span class="user-img"> <img
                                                    src="{{asset('images/AdminDashboardImages/images/users/4.jpg')}}"
                                                    alt="user"
                                                    class="rounded-circle"> <span
                                                    class="profile-status offline pull-right"></span> </span>
                                            <div class="mail-contnet">
                                                <h5 class="message-title">Hager Elgebaly</h5> <span class="mail-desc">Just see the my admin!</span>
                                                <span class="time">9:02 AM</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link text-dark" href="javascript:void(0);"> <b>See
                                            all e-Mails</b> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="{{asset('images/AdminDashboardImages/images/users/1.jpg')}}" alt="user"
                                class="rounded-circle"
                                width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated bounceInRight">
                            <span class="with-arrow"><span class="bg-primary"></span></span>
                            <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                <div class=""><img src="{{asset('images/AdminDashboardImages/images/users/1.jpg')}}"
                                                   alt="user" class="img-circle" width="60">
                                </div>
                                <div class="m-l-10">
                                    <h4 class="m-b-0">Ahmed R.Mohamed</h4>
                                    <p class=" m-b-0">ahmedortega@gmail.com</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My
                                Profile</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My
                                Activity</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i>
                                Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i
                                    class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            <div class="dropdown-divider"></div>
                            <div class="p-l-30 p-10"><a href="javascript:void(0)"
                                                        class="btn btn-sm btn-success btn-rounded">Super Admin</a></div>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- ***********************  End Topbar header ***************************** -->
    <!-- ============================================================== -->


    <!--        ***************************************************************************************************           -->


    <!-- ============================================================== -->
    <!-- ************************* Left Sidebar ******************************* -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li>
                        <!-- User Profile-->
                        <div class="user-profile d-flex no-block dropdown mt-3">
                            <div class="user-pic"><img src="{{asset('images/AdminDashboardImages/images/users/1.jpg')}}"
                                                       alt="users" class="rounded-circle"
                                                       width="40"/></div>
                            <div class="user-content hide-menu ml-2">
                                <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <h5 class="mb-0 user-name font-medium">Ahmed R.Mohamed <i
                                            class="fa fa-angle-down"></i></h5>
                                    <span class="op-5 user-email">ahmedortega@gmail.com</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user mr-1 ml-1"></i>
                                        My Profile</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                            class="ti-wallet mr-1 ml-1"></i> My Activity</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                            class="ti-email mr-1 ml-1"></i> Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                            class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                            class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                </div>
                            </div>
                        </div>
                        <!-- End User Profile-->
                    </li>
                    <!-- Links-->
                    <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                            class="hide-menu">C . R . M</span></li>
                    <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                                href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-account-multiple"></i><span class="hide-menu">Users </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i
                                        class="mdi mdi-account-plus"></i><span class="hide-menu"> Add User </span></a>
                            </li>
                            <li class="sidebar-item"><a href="../admin-dashboard/users" class="sidebar-link"><i
                                        class="mdi mdi-account-multiple"></i><span
                                        class="hide-menu">  View Users </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                                href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-file-image"></i><span class="hide-menu">Posts </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i
                                        class="mdi mdi-database-plus"></i><span class="hide-menu"> Add Post</span></a>
                            </li>
                            <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i
                                        class="mdi mdi-book-open"></i><span class="hide-menu"> Post Detail </span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-message-alert"></i><span class="hide-menu">Notifications</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-email"></i><span class="hide-menu">Emails</span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- **************** content of vue *************************** -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <section class="content-of-site">
            {{-- Content of the Site   --}}
            @yield('content')
        </section>
        <section class="content-of-vue">
            <div class="app" id="app">
                <div class="container">
                    <div class="row">
                        @if ((Request::path() == 'admin-dashboard/users') || (Request::path() == 'admin-dashboard/user'))
                            <user-component></user-component>
                        @elseif (Request::path() == 'admin-dashboard/posts')
                            <Post></Post>
                        @endif
                    </div>
                </div>
            </div>
        </section>


    </div>

</div>

<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('libraries/AdminDashboardLibs/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('libraries/AdminDashboardLibs/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- apps -->
<script src="{{asset('js/AdminDashboardJs/js/app.min.js')}}"></script>
<script src="{{asset('js/AdminDashboardJs/js/app.init.light-sidebar.js')}}"></script>
<!-- Theme settings -->
<script src="{{asset('js/AdminDashboardJs/js/app-style-switcher.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script
    src="{{asset('libraries/AdminDashboardLibs/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<!--    <script src="../../dist/js/waves.js"></script>-->
<!--Menu sidebar -->
<script src="{{asset('js/AdminDashboardJs/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('js/AdminDashboardJs/js/custom.min.js')}}"></script>
<!--This page JavaScript -->
<script src="{{asset('libraries/AdminDashboardLibs/libs/c3/d3.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/c3/c3.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/chart.js/dist/Chart.min.js')}}"></script>
<!--    for Estimated User Plugin -->
<script src="{{asset('libraries/AdminDashboardLibs/libs/gaugeJS/dist/gauge.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/flot/excanvas.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/flot/jquery.flot.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>

<script src="{{asset('js/AdminDashboardJs/js/dashboard.js')}}"></script>
</body>

</html>
