<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('images/welcomeimages/icon.png')}}">
    <title style="font-weight: bold">Recycler </title>
    <link rel="icon" href="{{asset('images/welcomeimages/icon2.png')}}">
    <link href='http://fonts.googleapis.com/css?family=Poppins:100,200,300,400,400i,500,600,700%7CMontserrat:700'
          rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{asset('registerLogin/css/bootstrap.min.css')}}">
    {{--<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('registerLogin/css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div class="form-body" class="container-fluid">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="{{asset('registerLogin/images/graphic2.svg')}}" alt="">
            </div>
        </div>
        @yield('content')

        {{--<form>--}}
        {{--<input class="form-control" type="text" name="name" placeholder="Full Name" required>--}}
        {{--<input class="form-control" type="email" name="email" placeholder="E-mail Address" required>--}}
        {{--<input class="form-control" type="password" name="password" placeholder="Password" required>--}}
        {{--<input class="form-control" type="password" name="password" placeholder="Re-Password" required>--}}
        {{--<div class="form-button">--}}
        {{--<button id="submit" type="submit" class="ibtn">Register</button>--}}
        {{--</div>--}}
        {{--</form>--}}
        <div class="other-links">
            <span>Or register with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('registerLogin/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('registerLogin/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('registerLogin/js/main.js')}}"></script>
</body>
</html>
