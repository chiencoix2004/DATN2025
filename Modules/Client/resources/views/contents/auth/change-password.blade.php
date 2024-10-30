@extends('client::layouts.master')

@section('title')
    Đổi mật khẩu
@endsection
@section('contents')
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
            <ul>
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="active"><a href="{{ route('password.change') }}">Đổi mật khẩu</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->

<!-- Begin Kenne's Login Register Area -->
<div class="kenne-login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <form action="{{ route('password.change') }}" method="POST">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Đổi mật khẩu</h4>

                        <div class="row">
                            <div class="col-12 mb--20">
                                <label>{{ __('Mật khẩu hiện tại') }}</label>
                                <input type="password" name="current_password" placeholder="Password">
                            </div>
                            <div style="color: red">
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 mb--20">
                                <label>{{ __('Mật khẩu mới') }}</label>
                                <input type="password" name='password' placeholder="Password">
                            </div>
                            <div style="color: red">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 mb--20">
                                <label>{{ __('Xác nhận mật khẩu mới') }}</label>
                                <input type="password" name="password_confirmation" placeholder="Password">
                            </div>
                            <div class="col-md-4">
                                <div class="forgotton-password_info">
                                    <a href="#"> Quên mật khẩu ? </a>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="kenne-login_btn"> {{ __('Đổi mật khẩu') }}</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Login Register Area  End Here -->

<!-- Begin Brand Area -->

<!-- Brand Area End Here -->
    {{-- <div class="kenne-login-register_area">
        <div class="container">
            <div class="row">
                <form method="POST" action="{{ route('password.change') }}">
                    @csrf
                    <div>
                        <label for="current_password">{{ __('Mật khẩu hiện tại') }}</label>
                        <input id="current_password" type="password" name="current_password" required autofocus>
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div>
                        <label for="password">{{ __('Mật khẩu mới') }}</label>
                        <input id="password" type="password" name="password" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div>
                        <label for="password_confirmation">{{ __('Xác nhận mật khẩu mới') }}</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required>
                    </div>
            
                    <div>
                        <button type="submit">
                            {{ __('Đổi mật khẩu') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection

