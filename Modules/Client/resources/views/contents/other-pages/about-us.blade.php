@extends('client::layouts.master')

@section('title')
    Giới thiệu | Thời trang Phong cách Việt
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Giới thiệu</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's About Us Area -->
    <div class="about-us-area">
        <div class="container">
            <!-- Phần giới thiệu -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 col-md-5">
                    <div class="overview-img text-center img-hover_effect">
                        <a href="#">
                            <img class="img-full" src="{{ asset('theme/client/images/about-us/1.jpg') }}"
                                alt="Kenne's About Us Image" style="width: 100%; height: auto; border-radius: 10px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="overview-content">
                        <h2 class="mb-4">Chào mừng đến với <span>Fashion</span> Thời trang Phong cách Việt!</h2>
                        <p class="short_desc mb-4">
                            Chào mừng bạn đến với Thời Trang Phong Cách Việt, nơi hội tụ tinh hoa thời trang Việt Nam! Chúng tôi tự hào mang đến những thiết kế thời trang vừa hiện đại vừa đậm chất truyền thống, nhằm tôn vinh vẻ đẹp và bản sắc văn hóa Việt.
                        </p>
                        <div class="kenne-about-us_btn-area">
                            <a class="about-us_btn btn btn-primary" href="{{ route('shop.shopIndex') }}">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Sứ mệnh và Tầm nhìn -->
            <div class="row mb-5">
                <!-- Sứ mệnh -->
                <div class="col-lg-6 col-md-6">
                    <div class="mission-content">
                        <h3 class="mb-3">Sứ mệnh của chúng tôi</h3>
                        <p class="short_desc">
                            Chúng tôi cam kết giữ gìn và lan tỏa giá trị văn hóa dân tộc thông qua thời trang. Mỗi sản phẩm tại Thời Trang Phong Cách Việt không chỉ là một bộ trang phục, mà còn là câu chuyện về lịch sử, nghệ thuật, và tình yêu quê hương.
                        </p>
                    </div>
                </div>
                <!-- Tầm nhìn -->
                <div class="col-lg-6 col-md-6">
                    <div class="vision-content">
                        <h3 class="mb-3">Tầm nhìn</h3>
                        <p class="short_desc">
                            Hướng tới trở thành thương hiệu thời trang hàng đầu đại diện cho phong cách sống Việt Nam trên bản đồ quốc tế. Chúng tôi mong muốn đưa những giá trị truyền thống vượt khỏi biên giới, tạo dấu ấn đặc sắc trong ngành công nghiệp thời trang toàn cầu.
                        </p>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!-- Kenne's About Us Area End Here -->

    <!-- Begin Kenne's Project Countdown Area -->
    {{-- <div class="project-count-area">
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
    </div> --}}
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
                                <img src="{{ asset('theme/client/images/about-us/team/1.jpg') }}" alt="Our Team Member">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h3>Edwin Adams</h3>
                            <p>IT Expert</p>
                            <a href="#">info@example.com</a>
                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip"
                                            target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Instagram">
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
                                <img src="{{ asset('theme/client/images/about-us/team/2.jpg') }}" alt="Our Team Member">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h3>Anny Adams</h3>
                            <p>Web Designer</p>
                            <a href="#">info@example.com</a>
                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip"
                                            target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Instagram">
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
                                <img src="{{ asset('theme/client/images/about-us/team/3.jpg') }}" alt="Our Team Member">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h3>Edvin Adams</h3>
                            <p>Content Writer</p>
                            <a href="javascript:void(0)">info@example.com</a>
                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip"
                                            target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Instagram">
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
                                <img src="{{ asset('theme/client/images/about-us/team/4.jpg') }}" alt="Our Team Member">
                            </a>
                        </div>
                        <div class="team-content text-center">
                            <h3>Eddy Adams</h3>
                            <p>Marketing officer</p>
                            <a href="#">info@example.com</a>
                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip"
                                            target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Instagram">
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
@endsection
