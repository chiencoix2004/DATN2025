@extends('user::layouts.main')
{{-- @section('title')
    @parent
    Danh sách sản phẩm
@endsection --}}


@section('content')

 <!-- Begin Kenne's Breadcrumb Area -->
 <br>
 <br>
 <br>
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Other</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Kenne's About Us Area -->
<div class="about-us-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="overview-img text-center img-hover_effect">
                    <a href="#">
                        <img class="img-full" src="assets/images/about-us/1.jpg" alt="Kenne's About Us Image">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 d-flex align-items-center">
                <div class="overview-content">
                    <h2>Welcome To <span>Kenne's</span> Store!</h2>
                    <p class="short_desc">We Provide Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Repudiandae nisi fuga facilis, consequuntur, maiores eveniet voluptatum, omnis possimus
                        temporibus aspernatur nobis animi in exercitationem vitae nulla! Adipisci ullam illum quisquam.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, nulla veniam? Magni aliquid
                        asperiores magnam. Veniam ex tenetur.</p>
                    <div class="kenne-about-us_btn-area">
                        <a class="about-us_btn" href="shop-left-sidebar.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's About Us Area End Here -->

<!-- Begin Kenne's Project Countdown Area -->
<div class="project-count-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-count text-center">
                    <div class="count-icon">
                        <span class="ion-ios-briefcase-outline"></span>
                    </div>
                    <div class="count-title">
                        <h2 class="count">2169</h2>
                        <span>Project Done</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-count text-center">
                    <div class="count-icon">
                        <span class="ion-ios-wineglass-outline"></span>
                    </div>
                    <div class="count-title">
                        <h2 class="count">869</h2>
                        <span>Awards Winned</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-count text-center">
                    <div class="count-icon">
                        <span class="ion-ios-lightbulb-outline"></span>
                    </div>
                    <div class="count-title">
                        <h2 class="count">689</h2>
                        <span>Hours Worked</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-count text-center">
                    <div class="count-icon">
                        <span class="ion-happy-outline"></span>
                    </div>
                    <div class="count-title">
                        <h2 class="count">2169</h2>
                        <span>Happy Customer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Project Countdown Area End Here -->

<!-- Begin Kenne's Team Area -->
<div class="team-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title-2">
                    <h3>Our Team</h3>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member">
                    <div class="team-thumb img-hover_effect">
                        <a href="#">
                            <img src="assets/images/about-us/team/1.jpg" alt="Our Team Member">
                        </a>
                    </div>
                    <div class="team-content text-center">
                        <h3>Edwin Adams</h3>
                        <p>IT Expert</p>
                        <a href="#">info@example.com</a>
                        <div class="kenne-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member">
                    <div class="team-thumb img-hover_effect">
                        <a href="#">
                            <img src="assets/images/about-us/team/2.jpg" alt="Our Team Member">
                        </a>
                    </div>
                    <div class="team-content text-center">
                        <h3>Anny Adams</h3>
                        <p>Web Designer</p>
                        <a href="#">info@example.com</a>
                        <div class="kenne-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member">
                    <div class="team-thumb img-hover_effect">
                        <a href="#">
                            <img src="assets/images/about-us/team/3.jpg" alt="Our Team Member">
                        </a>
                    </div>
                    <div class="team-content text-center">
                        <h3>Edvin Adams</h3>
                        <p>Content Writer</p>
                        <a href="javascript:void(0)">info@example.com</a>
                        <div class="kenne-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member">
                    <div class="team-thumb img-hover_effect">
                        <a href="#">
                            <img src="assets/images/about-us/team/4.jpg" alt="Our Team Member">
                        </a>
                    </div>
                    <div class="team-content text-center">
                        <h3>Eddy Adams</h3>
                        <p>Marketing officer</p>
                        <a href="#">info@example.com</a>
                        <div class="kenne-social_link">
                            <ul>
                                <li class="facebook">
                                    <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="youtube">
                                    <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="google-plus">
                                    <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                        <i class="fab fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="instagram">
                                    <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
        </div>
    </div>
</div>
<!-- Kenne's Team Area End Here -->

<!-- Begin Brand Area -->
<div class="brand-area ">
    <div class="container">
        <div class="brand-nav border-top ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kenne-element-carousel brand-slider slider-nav" data-slick-options='{
                        "slidesToShow": 6,
                        "slidesToScroll": 1,
                        "infinite": false,
                        "arrows": false,
                        "dots": false,
                        "spaceBetween": 30
                        }' data-slick-responsive='[
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
                                <img src="assets/images/brand/1.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="assets/images/brand/2.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="assets/images/brand/3.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="assets/images/brand/4.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="assets/images/brand/5.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="assets/images/brand/6.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="assets/images/brand/1.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="javascript:void(0)">
                                <img src="assets/images/brand/2.png" alt="Brand Images">
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
