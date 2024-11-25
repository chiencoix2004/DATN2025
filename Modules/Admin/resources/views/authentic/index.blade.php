<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/remos/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Oct 2024 02:35:03 GMT -->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Trang Đăng Nhập Admin</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/admin/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/admin/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/admin/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/admin/css/style.css') }}">



    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('theme/admin/font/fonts.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('theme/admin/icon/style.css') }}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('theme/admin/images/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('theme/admin/images/favicon.png') }}">

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="wrap-login-page">
                <div class="flex-grow flex flex-column justify-center gap30">
                    <a href="index.html" id="site-logo-inner">

                    </a>
                    <div class="login-box">
                        <div>
                            <h3>Đăng nhập vào tài khoản Quản trị viên</h3>
                            <div class="body-text">Nhập Email của bạn và Mật khẩu để đăng nhập</div>
                        </div>

                        <form action="{{ route('loginAdmin') }}" method="POST"
                            class="form-login flex flex-column gap24">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <div class="email">
                                <div class="body-title mb-10">Địa chỉ Email <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" id="email" type="email"
                                    placeholder="Nhập Email" name="email" tabindex="0" value=""
                                    required="">
                            </div>
                            <div class="password">
                                <div class="body-title mb-10">Mật khẩu <span class="tf-color-1">*</span></div>
                                <input class="password-input" id="password" type="password"
                                    placeholder="Nhập mật khẩu" name="password" tabindex="0" value=""
                                    required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex gap10">
                                    <input class="" type="checkbox" id="signed" name="remember">

                                    <label class="body-text" for="signed">Ghi nhớ tôi</label>
                                </div>
                                <a href="{{route('admin.forgot.password')}}" class="body-text tf-color">Quên mật khẩu?</a>
                            </div>
                            <button class="tf-button w-full" type="submit">Đăng nhập</button>
                        </form>
                    </div>
                </div>
                <div class="text-tiny">Copyright © 2024 Remos, All rights reserved.</div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->
    <!-- Javascript -->
    <script src="{{ asset('theme/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/admin/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('theme/admin/js/main.js') }}"></script>

</body>


<!-- Mirrored from themesflat.co/html/remos/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Oct 2024 02:35:03 GMT -->

</html>
