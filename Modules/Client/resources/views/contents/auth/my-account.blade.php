@extends('client::layouts.master')

@section('title')
    Tài khoản | Thời trang Phong cách Việt
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Tài khoản</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Page Content Area -->
    <main class="page-content">
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab"
                                    href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                    aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders"
                                    role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-address-tab" data-bs-toggle="tab" href="#account-address"
                                    role="tab" aria-controls="account-address" aria-selected="false">Addresses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details"
                                    role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-logout-tab" href="login-register.html" role="tab"
                                    aria-selected="false">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-dashboard">
                                    <p>Hello <b>Edwin Adams</b> (not Edwin Adams? <a href="login-register.html">Sign
                                            out</a>)</p>
                                    <p>From your account dashboard you can view your recent orders, manage your shipping and
                                        billing addresses and <a href="javascript:void(0)">edit your password and account
                                            details</a>.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">MY ORDERS</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>ORDER</th>
                                                    <th>DATE</th>
                                                    <th>STATUS</th>
                                                    <th>TOTAL</th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td><a class="account-order-id" href="javascript:void(0)">#5364</a></td>
                                                    <td>Mar 27, 2019</td>
                                                    <td>On Hold</td>
                                                    <td>£162.00 for 2 items</td>
                                                    <td><a href="javascript:void(0)"
                                                            class="kenne-btn kenne-btn_sm"><span>View</span></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a class="account-order-id" href="javascript:void(0)">#5356</a></td>
                                                    <td>Mar 27, 2019</td>
                                                    <td>On Hold</td>
                                                    <td>£162.00 for 2 items</td>
                                                    <td><a href="javascript:void(0)"
                                                            class="kenne-btn kenne-btn_sm"><span>View</span></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-address" role="tabpanel"
                                aria-labelledby="account-address-tab">
                                <div class="myaccount-address">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="small-title">Billing Adress</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                        <div class="col">
                                            <h4 class="small-title">Shipping Address</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details" role="tabpanel"
                                aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form action="#" class="kenne-form">
                                        <div class="kenne-form-inner">
                                            <div class="single-input single-input-half">
                                                <label for="account-details-firstname">First Name*</label>
                                                <input type="text" id="account-details-firstname">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="account-details-lastname">Last Name*</label>
                                                <input type="text" id="account-details-lastname">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-email">Email*</label>
                                                <input type="email" id="account-details-email">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-oldpass">Current Password(leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-oldpass">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-newpass">New Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-newpass">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-confpass">Confirm New Password</label>
                                                <input type="password" id="account-details-confpass">
                                            </div>
                                            <div class="single-input">
                                                <button class="kenne-btn kenne-btn_dark" type="submit"><span>SAVE
                                                        CHANGES</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kenne's Account Page Area End Here -->
    </main>

    <!-- Begin Brand Area -->
    <div class="brand-area ">
        <div class="container">
            <div class="brand-nav border-top ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kenne-element-carousel brand-slider slider-nav"
                            data-slick-options='{
                            "slidesToShow": 6,
                            "slidesToScroll": 1,
                            "infinite": false,
                            "arrows": false,
                            "dots": false,
                            "spaceBetween": 30
                            }'
                            data-slick-responsive='[
                            {"breakpoint":992, "settings": {
                            "slidesToShow": 4
                            }},
                            {"breakpoint":768, "settings": {
                            "slidesToShow": 3
                            }},
                            {"breakpoint":576, "settings": {
                            "slidesToShow": 2
                            }}
                        ]'>

                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/1.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/2.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/3.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/4.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/5.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/6.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/1.png') }}" alt="Brand Images">
                                </a>
                            </div>
                            <div class="brand-item">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/brand/2.png') }}" alt="Brand Images">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Area End Here -->
@endsection
