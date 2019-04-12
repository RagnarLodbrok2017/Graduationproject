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
    <link href="{{asset('libraries/AdminDashboardLibs/libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('libraries/AdminDashboardLibs/libs/css-chart/css-chart.css')}}" rel="stylesheet">
    <link href="{{asset('libraries/AdminDashboardLibs/libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <link href="{{asset('libraries/AdminDashboardLibs/libs/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet"/>
    <link href="{{asset('libraries/AdminDashboardLibs/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
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
    <link href="{{asset('css/AdminDashboardCss/css/bootstrapAndPlugins.css')}}" rel="stylesheet">
    <link href="{{asset('libraries/AdminDashboardLibs/libs/bootstrapvalidator/dist/css/bootstrapValidator.css')}}" rel="stylesheet">
    <!-- <link href="../../dist/css/notimportant.css" rel="stylesheet"> -->
    <link href="{{asset('css/AdminDashboardCss/css/masterStyle.css')}}" rel="stylesheet">

</head>

<body>
<div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    @yield('content')
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<script src="{{asset('libraries/AdminDashboardLibs/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('libraries/AdminDashboardLibs/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('libraries/AdminDashboardLibs/libs/bootstrapvalidator/dist/js/bootstrapValidator.js')}}"></script>
{{--<script src="{{asset('libraries/AdminDashboardLibs/libs/bootstrap-validate.js')}}"></script>--}}
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    $(document).ready(function() {
        $('.RegisterFormValidation').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    message: 'The name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The username is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 20,
                            message: 'The name must be more than 6 and less than 30 characters long'
                        },
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
                confirmPassword: {
                    validators:{
                        identical: {
                            field: 'password',
                            message:"the passwords doesn't matches!",
                        }
                    }
                }
            }
        });
        // $('.LoginFormValidation').bootstrapValidator({
        //     message: 'This value is not valid',
        //     fields: {
        //         email: {
        //             validators: {
        //                 notEmpty: {
        //                     message: 'The email is required and cannot be empty'
        //                 },
        //                 emailAddress: {
        //                     message: 'The input is not a valid email address'
        //                 },
        //                 stringLength: {
        //                     min: 10,
        //                     max: 40,
        //                     message: 'The email must be more than 10 and less than 40 characters long'
        //                 },
        //             },
        //         },
        //         password: {
        //             validators:{
        //                 stringLength: {
        //                     min: 8,
        //                     max: 20,
        //                     message: 'The password must be more than 8 and less than 20 characters long'
        //                 },
        //             }
        //         }
        //     }
        // });
    });
    // bootstrapValidate('#Name',"max:20:Don't Enter more than 20 character!");
    // bootstrapValidate('#Email',"max:30:Don't Enter more than 30 character!");
    // bootstrapValidate('#Password',"max:20:Don't Enter more than 20 character!");
    // bootstrapValidate('#Password',"matches:#PasswordConfirm:Passwords doesn't match!");
</script>
</body>
</html>
