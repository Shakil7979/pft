 
<!DOCTYPE html>
<html class="loading dark-layout"  lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Reset - Finanor</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    {{-- common css  --}} 
    <link href="{{asset('common/css/toastr.min.css')}}" rel="stylesheet" type="text/css" /> 
    <link href="{{asset('common/css/ext-component-toastr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('common/css/ext-component-sweet-alerts.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('common/css/form-validation.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .error-msg {
            color: rgb(206, 53, 53);
            font-size: 14px;
        }
        .logo_img {
            width: 150px;
        }
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{url('/')}}" class="brand-logo"> 
                                    <h2 class="brand-text"><img class="logo_img" src="{{asset('main/img/logo.png')}}" alt=""></h2>
                                </a> 

                                <h4 class="card-title mb-1">Reset Password? 🔒</h4>
                                <p class="card-text mb-2">Your new password must be different from previously used passwords</p>

                                <form class="auth-forgot-password-form mt-2" id='reset_form' action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ $email }}"> 
                                    {{-- <div class="mb-1">
                                        <label for="email" class="form-label">email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') }}" aria-describedby="email" tabindex="1" autofocus="" required>
                                    </div>  --}}
                                    <div class="mb-1">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password" aria-describedby="password" tabindex="1" autofocus="">
                                    </div> 
                                    <div class="mb-1">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" aria-describedby="password_confirmation" tabindex="1" autofocus="">
                                    </div> 

                                    <button type="button" class="btn btn-primary w-100 waves-effect waves-float waves-light" id="ResetFormBtn" onclick="_run(this)" data-el="fg" data-form="reset_form" data-loading="<div class='spinner-border spinner-border-sm' role='status'></div>" data-callback="ResetFormCallback" data-btnid="ResetFormBtn">Reset Password</button>
                                </form>  
                            <div></div></div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/auth-login.js')}}"></script>
    <!-- END: Page JS-->

     {{-- common js  --}} 
     <script src="{{asset('common/js/jquery.validate.min.js')}}"></script>
     <script src="{{asset('common/js/common-ajax.js')}}"></script>
     <script src="{{asset('common/js/confirm-alert.js')}}"></script>
     <script src="{{asset('common/js/custom-validation.js')}}"></script>
     <script src="{{asset('common/js/toastr.min.js')}}"></script>

    <script>
        function ResetFormCallback(data){
            if (data.status == true) {
                notify('success', data.message, 'Success');
                setTimeout(function() {
                    window.location.href = "/login";
                }, 1000 * 2);
            } else {
                notify('error', data.message, 'Error');
                $.validator("reset_form", data.errors);
            }
        }

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>