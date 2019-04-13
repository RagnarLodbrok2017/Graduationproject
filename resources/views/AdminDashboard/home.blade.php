@extends('layouts.AdminDashboardFunctionLayout')

@section('content')
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Dashboard -> Home  Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Posts and Users and Likes Estimnation Summery -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <!-- First Card -->
                <div class="col-sm-12 col-lg-6">
                    <div class="firstCard card card-hover rounded">
                        <div class="down">
                        </div>
                        <div class="card-header">
                            <h4> Designer </h4>
                            <button class="btn float-right" name="button">
                                <i class="ti-close"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <h3 class="font-weight-200 mb-0">Ahmed R. Mohamed</h3>
                            <p>The Master Of The Admin Panel</p>
                            <ul class="listInCard flexbox flex-justified mt-20">
                                <li>
                                    <p class="font-size-20 text-success mb-0 font-weight-300"><i
                                            class="fa fa-caret-up text-success"></i> +1.92%</p>
                                    <small class="font-size-12">5,265.81</small>
                                    <p> Likes</p>
                                </li>

                                <li>
                                    <p class="font-size-20 text-danger mb-0 font-weight-300"><i
                                            class="fa fa-caret-down text-danger"></i>
                                        -0.92%
                                    </p>
                                    <small class="font-size-12">4,438.81</small>
                                    <p> Users</p>
                                </li>

                                <li>
                                    <p class="font-size-20 text-success mb-0 font-weight-300"><i
                                            class="fa fa-caret-up text-success"></i> +1.12%</p>
                                    <small class="font-size-12">5,425.81</small>
                                    <p> Comments</p>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <p></p>
                        </div>
                    </div>
                </div>
                <!-- column Second Card-->
                <div class="col-sm-12 col-lg-4">
                    <!-- Second Card -->
                    <div class="secondCard card card-hover rounded">
                        <div class="card-header">
                            <div class="top">
                                <p class="float-left">Recycler</p>
                                <button class="btn btn-outline-light rounded-circle float-right">Stas</button>
                            </div>
                            <div class="down">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column Third Card-->
                <div class="col-lg-2 d-none d-lg-block d-xl-block">
                    <div class="thirdCard card">
                        <div class="card-header card-hover">
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="m-r-10">
                                    <span>Likes</span>
                                    <h4>40,355</h4>
                                </div>
                                <div class="ml-auto">
                                    <div style="max-width:130px; height:15px;" class="m-b-40">
                                        <canvas id="balance"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span>Number Of Posts</span>
                                    <h4>9,851</h4>
                                </div>
                                <div class="ml-auto">
                                    <div class="" id="ravenue"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-sm-12 col-lg-4">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span>Estimated Users</span>
                                    <h4>2345</h4>
                                </div>
                                <div class="ml-auto">
                                    <div class="gaugejs-box">
                                        <canvas id="foo" class="gaugejs" height="50" width="100">guage</canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Realtime Posts and Users Estimnation Summery 2 -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Realtime Visits</h4>
                                    <h5 class="card-subtitle">Overview of Realtime Visits of Users</h5>
                                </div>
                                <div class="ml-auto">
                                    <div class="dl">
                                        <select class="custom-select">
                                            <option value="0" selected>Monthly</option>
                                            <option value="1">Daily</option>
                                            <option value="2">Weekly</option>
                                            <option value="3">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- title -->
                            <div class="m-t-30">
                                <div id="placeholder" class="" style="height:250px;"></div>
                            </div>
                        </div>
                        <!-- card-ody of the 4 coloumns of the Estimation   -->
                        <div class="card-body border-top">
                            <div class="row m-t-10">
                                <!-- Column -->
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-20">
                                            <div data-label="20%" class="css-bar m-b-0 css-bar-primary css-bar-80"><i
                                                    class="mdi mdi-magnify text-info"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="m-b-0">80%</h3><span>Search Histogram</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-20">
                                            <div data-label="20%" class="css-bar m-b-0 css-bar-danger css-bar-10"><i
                                                    class="mdi mdi-account-alert text-danger"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="m-b-0">30%</h3><span>Banned Users</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-20">
                                            <div data-label="75%" class="css-bar m-b-0 css-bar-success css-bar-75"><i
                                                    class="mdi mdi-lightbulb-outline text-cyan"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="m-b-0">75%</h3><span>Active Posts</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-20">
                                            <div data-label="20%" class="css-bar m-b-0 css-bar-danger css-bar-15"><i
                                                    class="mdi mdi-video text-purple"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="m-b-0">15%</h3><span>Banned Posts</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Table Of top Liked Posts -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- title -->
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Top Likes Posts</h4>
                                    <h5 class="card-subtitle">Overview of Top Likes Posts</h5>
                                </div>
                                <div class="ml-auto">
                                    <div class="dl">
                                        <select class="custom-select">
                                            <option value="0" selected>Monthly</option>
                                            <option value="1">Daily</option>
                                            <option value="2">Weekly</option>
                                            <option value="3">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- title -->
                        </div>
                        <div class="table-responsive">
                            <table class="table v-middle">
                                <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">Posts</th>
                                    <th class="border-top-0">User</th>
                                    <th class="border-top-0">Support Admin</th>
                                    <th class="border-top-0">Licence</th>
                                    <th class="border-top-0">Comments</th>
                                    <th class="border-top-0">Likes</th>
                                    <th class="border-top-0">Unlikes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a class="btn btn-circle btn-info text-white">RC</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Recycling Chair</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Ahmed Ortega</td>
                                    <td>Ahmed R.Mohamed</td>
                                    <td>
                                        <label class="label label-danger">Vip</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="m-b-0">20</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a class="btn btn-circle btn-orange text-white">RC</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Recycling Chair</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Emad Mohamed</td>
                                    <td>Ahmed Essam</td>
                                    <td>
                                        <label class="label label-info">Vip</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="m-b-0">250</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a class="btn btn-circle btn-success text-white">RC</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Recycling Chair</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Single Use</td>
                                    <td>John Doe</td>
                                    <td>
                                        <label class="label label-success">normal</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="m-b-0">214</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><a class="btn btn-circle btn-purple text-white">RC</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">Recycling Chair</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Abdo Nabil</td>
                                    <td>Hossam Ali</td>
                                    <td>
                                        <label class="label label-purple">banned</label>
                                    </td>
                                    <td>46</td>
                                    <td>356</td>
                                    <td>
                                        <h5 class="m-b-0">210</h5>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Posts</h4>
                        </div>
                        <div class="comment-widgets scrollable" style="height:560px;">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2"><img src="{{asset('images/AdminDashboardImages/images/users/1.jpg')}}" alt="user" width="50"
                                                      class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">James Anderson</h6>
                                    <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">April 14, 2016</span> <span
                                            class="label label-rounded label-primary">Pending</span> <span
                                            class="action-icons">
                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                        <a href="javascript:void(0)"><i class="ti-check"></i></a>
                        <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="{{asset('images/AdminDashboardImages/images/users/4.jpg')}}" alt="user" width="50"
                                                      class="rounded-circle"></div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium">Michael Jorden</h6>
                                    <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer ">
                                        <span class="text-muted float-right">April 14, 2016</span>
                                        <span class="label label-success label-rounded">Approved</span>
                                        <span class="action-icons active">
                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                        <a href="javascript:void(0)"><i class="icon-close"></i></a>
                        <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="{{asset('images/AdminDashboardImages/images/users/5.jpg')}}" alt="user" width="50"
                                                      class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">Johnathan Doeting</h6>
                                    <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">April 14, 2016</span>
                                        <span class="label label-rounded label-danger">Rejected</span>
                                        <span class="action-icons">
                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                        <a href="javascript:void(0)"><i class="ti-check"></i></a>
                        <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="{{asset('images/AdminDashboardImages/images/users/1.jpg')}}" alt="user" width="50"
                                                      class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">James Anderson</h6>
                                    <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-right">April 14, 2016</span> <span
                                            class="label label-rounded label-primary">Pending</span> <span
                                            class="action-icons">
                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                        <a href="javascript:void(0)"><i class="ti-check"></i></a>
                        <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                      </span></div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2"><img src="{{asset('images/AdminDashboardImages/images/users/4.jpg')}}" alt="user" width="50"
                                                      class="rounded-circle"></div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium">Michael Jorden</h6>
                                    <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                    <div class="comment-footer ">
                                        <span class="text-muted float-right">April 14, 2016</span>
                                        <span class="label label-success label-rounded">Approved</span>
                                        <span class="action-icons active">
                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                        <a href="javascript:void(0)"><i class="icon-close"></i></a>
                        <a href="javascript:void(0)"><i class="ti-heart text-danger"></i></a>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Chats</h4>
                            <div class="chat-box scrollable" style="height:475px;">
                                <!--chat Row -->
                                <ul class="chat-list">
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="{{asset('images/AdminDashboardImages/images/users/1.jpg')}}" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Ahmed Essam</h6>
                                            <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the
                                                printing &amp; type setting industry.
                                            </div>
                                        </div>
                                        <div class="chat-time">10:56 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="{{asset('images/AdminDashboardImages/images/users/2.jpg')}}" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Samy Gamal</h6>
                                            <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                        </div>
                                        <div class="chat-time">10:57 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">I would love to join the team.</div>
                                            <br>
                                        </div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="odd chat-item">
                                        <div class="chat-content">
                                            <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                            <br>
                                        </div>
                                        <div class="chat-time">10:59 am</div>
                                    </li>
                                    <!--chat Row -->
                                    <li class="chat-item">
                                        <div class="chat-img"><img src="{{asset('images/AdminDashboardImages/images/users/3.jpg')}}" alt="user"></div>
                                        <div class="chat-content">
                                            <h6 class="font-medium">Marian Shady</h6>
                                            <div class="box bg-light-info">Well we have good budget for the project
                                            </div>
                                        </div>
                                        <div class="chat-time">11:00 am</div>
                                    </li>
                                    <!--chat Row -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-field m-t-0 m-b-0">
                                        <textarea id="textarea1" placeholder="Type and enter"
                                                  class="form-control border-0"></textarea>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a class="btn-circle btn-lg btn-cyan float-right text-white"
                                       href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Ahmed R. Mohamed .
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}
{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                    <div class="alert alert-success" role="alert">--}}
{{--                        {{ session('status') }}--}}
{{--                    </div>--}}
{{--                    @endif--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@endsection


