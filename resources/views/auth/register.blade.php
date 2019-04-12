@extends('layouts.loginUserLayout')

@section('content')
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <div class="header">
                    <img src="{{asset('registerLogin/images/letter-r.svg')}}">
                    <h1>ECYCLER</h1>
                </div>
                <p>You can Register easily.</p>
                <div class="page-links">
                    <a href="../login">Login</a><a href="../register" class="active">Register</a>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="name" placeholder="Full Name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email" placeholder="Email Address" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" placeholder="Password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input placeholder="Confirm Password" id="password-confirm" type="password"
                                   class="form-control"
                                   name="password_confirmation" required>
                        </div>
                    </div>

                    {{--<input class="form-control" type="text" name="name" placeholder="Full Name" required>--}}
                    {{--<input class="form-control" type="email" name="email" placeholder="E-mail Address" required>--}}
                    {{--<input class="form-control" type="password" name="password" placeholder="Password" required>--}}
                    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation"--}}
                    {{--placeholder="Password Confirmation" required>--}}
                    {{--<input class="form-control" type="password" name="password" placeholder="Re-Password" required>--}}
                    <div class="form-button">
                        <button type="button" class="ibtn"><a href="../" class="backLink">Back</a></button>
                        <button id="submit" type="submit" class="ibtn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
