@extends('layouts.AuthAdminLayout')

@section('content')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
         style="background:url({{asset('images/AdminDashboardImages/images/big/background3.png')}}) no-repeat center center;">
        <div class="auth-box">
            <div>
                <div class="logo">
                    <span class="db"><img src="{{asset('images/AdminDashboardImages/images/icon.png')}}" alt="logo" style="padding-bottom: 12px;" /></span>
                    <h5 class="font-medium m-b-20">Sign Up to Admin</h5>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal m-t-20 RegisterFormValidation" action="{{route('AdminRegister')}}" method="post">
                            @csrf
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="form-group row ">
                                <div class="col-12 ">
                                    <input id="Name" name="name" class="form-control form-control-lg" type="text" required="" placeholder="Name" maxlength="100" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <input id="Email" name="email" class="form-control form-control-lg" type="email" required="" placeholder="Email"
                                           minlength="10" maxlength="30">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <input name="password" class="form-control form-control-lg" type="password" placeholder="Password" minlength="8" maxlength="20" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <input name="confirmPassword" class="form-control form-control-lg" type="password" placeholder="Confirm Password" id="inputPasswordConfirm"
                                            maxlength="20" minlength="8" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                        <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center ">
                                <div class="col-xs-12 p-b-20 ">
                                    <button class="btn btn-block btn-lg btn-info " type="submit">SIGN UP</button>
                                </div>
                            </div>
                            <div class="form-group m-b-0 m-t-10 ">
                                <div class="col-sm-12 text-center ">
                                    Already have an account? <a href="login" class="text-info m-l-5 "><b>Sign In</b></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
