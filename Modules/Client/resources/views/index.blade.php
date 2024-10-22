@extends('client::layouts.master')

@section('title')
    Fashion | Thời trang Phong cách Việt
@endsection
@section('contents')
    @include('client::contents.homeWeb.slider-area')

    <!-- Begin Service Area -->
    <div class="service-area">
        <div class="container">
            <div class="service-nav">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="service-item">
                            <div class="content">
                                <h4>Free Shipping</h4>
                                <p>Free shipping on all order</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="service-item">
                            <div class="content">
                                <h4>Money Return</h4>
                                <p>30 days for free return</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="service-item">
                            <div class="content">
                                <h4>Online Support</h4>
                                <p>Support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Area End Here -->

    <!-- Begin Banner Area -->
    <div class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-6 custom-xxs-col">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img src="{{ asset('theme/client/images/banner/1-1.jpg') }}" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 custom-xxs-col">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img src="{{ asset('theme/client/images/banner/1-2.jpg') }}" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 custom-xxs-col">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img src="{{ asset('theme/client/images/banner/1-3.jpg') }}" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End Here -->

    @include('client::contents.homeWeb.product-area')

    <!-- Begin Banner Area Two -->
    <div class="banner-area banner-area-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img class="img-full" src="{{ asset('theme/client/images/banner/1-4.jpg') }}"
                                    alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img class="img-full" src="{{ asset('theme/client/images/banner/1-5.jpg') }}"
                                    alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area Two End Here -->
    @include('client::contents.homeWeb.product-tab_area')
    @include('client::contents.homeWeb.latest-blog_area')

    <!-- Begin Kenne's Banner Area Four -->
    <div class="kenne-banner_area kenne-banner_area-4">
        <div class="banner-img"></div>
        <div class="banner-content">
            <h3>Get exclusive Products.</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text </p>
            <div class="contact-us">
                <a href="callto://+123123321345">(+123) 123 321 345</a>
            </div>
            <div class="kenne-btn-ps_center">
                <a class="kenne-btn transparent-btn" href="{{ route('shop.shopIndex') }}">Mua sắm ngay</a>
            </div>
        </div>
    </div>
    <!-- Kenne's Banner Area Four End Here -->

    <!-- Begin Kenne's Instagram Area -->
    <div class="kenne-instagram_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kenne-section_area">
                        <h3>Instagram Feed</h3>
                        <p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                            piece of classical</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="kenne-element-carousel instagram-slider arrow-style arrow-style-3"
                        data-slick-options='{
                "slidesToShow": 5,
                "slidesToScroll": 1,
                "infinite": false,
                "arrows": true,
                "dots": false,
                "spaceBetween": 30
                }'
                        data-slick-responsive='[
                {"breakpoint":1200, "settings": {
                "slidesToShow": 5
                }},
                {"breakpoint":992, "settings": {
                "slidesToShow": 4
                }},
                {"breakpoint":768, "settings": {
                "slidesToShow": 3
                }},
                {"breakpoint":576, "settings": {
                "slidesToShow": 2
                }},
                {"breakpoint":480, "settings": {
                "slidesToShow": 1
                }}
            ]'>

                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/1.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/2.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/3.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/4.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/5.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/6.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/7.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/1.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/2.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>
                        <div class="single-item img-hover_effect">
                            <div class="instagram-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('theme/client/images/instagram/3.jpg') }}"
                                        alt="Kenne's Instagram Image">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Instagram Area End Here -->
@endsection
