@extends('layouts.UserDashboardFunctionLayout')

@section('content')
    <div class="page">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Post Details</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../../../../dashboard">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Post</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex no-block justify-content-end align-items-center">
                        <div class="m-r-10">
                            <div class="lastmonth"></div>
                        </div>
                        <div class=""><small>Num Likes</small>
                            <h4 class="text-info m-b-0 font-medium">{{ $post->like->count()}} Like</h4></div>
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
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                @if (isset($post))
                <div class="col-lg-12" v-if="post">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $post->title }}</h3>
                            <h6 class="card-subtitle"><strong>User : </strong> {{ $post->user->name }}</h6>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="white-box text-center">
                                        <img src="{{asset('uploads/posts/images/'.$post->image)}}" class="img-responsive" style="max-width:100%;max-height:100%;"> </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-6">
                                    <h4 class="box-title m-t-40">Post description</h4>
                                    <p>{{$post->description}}</p>
                                    <h3 class="m-t-40"> Likes: <small class="text-success">({{$post->like->count()}})</small> .... Comments:
                                        <small class="text-success">({{$post->comment->count()}})</small></h3>
                                    <button class="btn btn-danger btn-rounded"> Report Post </button>
                                    <button class="btn btn-primary btn-rounded"> Save Post </button>
                                    <h3 class="box-title m-t-40">Key Highlights</h3>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check text-success"></i> Active </li>
                                        <li><i class="fa fa-check text-success"></i> {{ $post->created_at }}</li>
                                        <li><i class="fa fa-check text-success"></i> Has Video : {{ $post->has_video }}</li>
                                    </ul>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h3 class="box-title m-t-40">General Info</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td width="390">About</td>
                                                <td> {{$post->about}} </td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td> {{$post->color}} </td>
                                            </tr>
                                            <tr>
                                                <td>Meta Title</td>
                                                <td> {{$post->meta_title}} </td>

                                            </tr>
                                            <tr>
                                                <td>Meta Keyword</td>
                                                <td> {{$post->meta_keyword}} </td>
                                            </tr>
                                            <tr>
                                                <td>Posted at</td>
                                                <td>{{$post->created_at}} </td>
                                            </tr>
                                            @foreach($post->category as $index => $category )
                                            <tr>
                                                <td>Category {{ $index }} </td>
                                                <td> {{$category->name }} </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @if (isset($post->video))
                                    <div class="videos">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="{{asset('uploads/posts/videos/'.$post->video)}}" allowfullscreen></iframe>
                                        </div>
{{--                                        <div class="embed-responsive embed-responsive-16by9">--}}
{{--                                            <video width="320" height="240" controls>--}}
{{--                                                <source :src="pathVideos(post.video)" type="video">--}}
{{--                                                <source v-if="src" src="{{asset('uploads/posts/videos/'.$post->video)}}" :type="type">--}}
{{--                                            </video>--}}
{{--                                        </div>--}}
                                    </div>
                                    @endif
                                    <h3> Comments :</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            @foreach($post->comment as $index => $comment )
                                            <tr>
                                                <td width="390">
                                                    <a class="nav-link text-muted waves-effect waves-dark pro-pic" style="padding-top: 15px; line-height: 0px;float: left">
                                                        <img src="{{asset('images/AdminDashboardImages/images/users/'.$comment->user->photo)}}" alt="user" class="rounded-circle" width="31"/>
                                                    </a>
                                                    {{$comment->user->name}}
                                                </td>
                                                <td style="margin-top:20px; "> {{$comment->subject}} </td>
                                            </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
                <!-- Column -->
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            Ahmed R.Mohamed
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>

@endsection
<script>
</script>
<script>

</script>
