@extends('user::layouts.main')

{{-- @section('title')
    @parent
    Danh sách sản phẩm
@endsection --}}


@section('content')
<br>
 <br>
 <br>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Login Or Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Kenne's Login Register Area -->
<div class="kenne-login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- Login Form s-->
                <form action="#">
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label>Email Address*</label>
                                <input type="email" placeholder="Email Address">
                            </div>
                            <div class="col-12 mb--20">
                                <label>Password</label>
                                <input type="password" placeholder="Password">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="forgotton-password_info">
                                    <a href="#"> Forgotten pasward?</a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="kenne-login_btn">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="#">
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb--20">
                                <label>First Name</label>
                                <input type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label>Last Name</label>
                                <input type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-12">
                                <label>Email Address*</label>
                                <input type="email" placeholder="Email Address">
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input type="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label>Confirm Password</label>
                                <input type="password" placeholder="Confirm Password">
                            </div>
                            <div class="col-12">
                                <button class="kenne-register_btn">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Login Register Area  End Here -->

 @endsection
