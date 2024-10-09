@extends('user::layouts.master')

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
            <h2>Blog</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Blog List </li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->

<!-- Begin Kenne's Blog Grid View Area -->
<div class="grid-view_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <div class="kenne-blog-sidebar-wrapper">
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Search</h4>
                        <div class="search-form_area">
                            <form class="search-form" action="javascript:void(0)">
                                <input type="text" class="search-field" placeholder="search here">
                                <button type="submit" class="search-btn"><i class="ion-ios-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Archives</h4>
                        <ul class="kenne-blog-archive">
                            <li><a href="javascript:void(0)">October 2019</a></li>
                        </ul>
                    </div>
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Recent Posts</h4>
                        <div class="recent-post">
                            <div class="recent-post_thumb">
                                <a href="blog-details.html">
                                    <img class="img-full" src="assets/images/blog/1.jpg" alt="Kenne's Blog Image">
                                </a>
                            </div>
                            <div class="recent-post_desc">
                                <span><a href="blog-details.html">Ut eum laborum</a></span>
                                <span class="post-date">October 25,2019</span>
                            </div>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post_thumb">
                                <a href="blog-details.html">
                                    <img class="img-full" src="assets/images/blog/2.jpg" alt="Kenne's Blog Image">
                                </a>
                            </div>
                            <div class="recent-post_desc">
                                <span><a href="#">Soluta ad tempore</a></span>
                                <span class="post-date">October 24,2019</span>
                            </div>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post_thumb">
                                <a href="blog-details.html">
                                    <img class="img-full" src="assets/images/blog/3.jpg" alt="Kenne's Blog Image">
                                </a>
                            </div>
                            <div class="recent-post_desc">
                                <span><a href="blog-details.html">Possimus reiciendis</a></span>
                                <span class="post-date">October 24,2019</span>
                            </div>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post_thumb">
                                <a href="blog-details.html">
                                    <img class="img-full" src="assets/images/blog/4.jpg" alt="Kenne's Blog Image">
                                </a>
                            </div>
                            <div class="recent-post_desc">
                                <span><a href="blog-details.html">Tortor Posuere</a></span>
                                <span class="post-date">October 24,2019</span>
                            </div>
                        </div>
                        <div class="recent-post">
                            <div class="recent-post_thumb">
                                <a href="blog-details.html">
                                    <img class="img-full" src="assets/images/blog/5.jpg" alt="Kenne's Blog Image">
                                </a>
                            </div>
                            <div class="recent-post_desc">
                                <span><a href="blog-details.html">Hello World!</a></span>
                                <span class="post-date">October 24,2019</span>
                            </div>
                        </div>
                    </div>
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Comments</h4>
                        <div class="recent-comment">
                            <div class="user-img">
                                <img class="img-full" src="assets/images/blog/admin.jpg" alt="Kenne's Blog Image">
                            </div>
                            <div class="user-info">
                                <span>HasTech say:</span>
                                <a href="javascipt:void(0)">Nulla auctor mi vel nisl...</a>
                            </div>
                        </div>
                        <div class="recent-comment">
                            <div class="user-img">
                                <img class="img-full" src="assets/images/blog/user.jpg" alt="Kenne's Blog Image">
                            </div>
                            <div class="user-info">
                                <span>Kathy Young say:</span>
                                <a href="javascipt:void(0)">Mauris Venenatis Orci Quis...</a>
                            </div>
                        </div>
                        <div class="recent-comment">
                            <div class="user-img">
                                <img class="img-full" src="assets/images/blog/admin.jpg" alt="Kenne's Blog Image">
                            </div>
                            <div class="user-info">
                                <span>HasTech say:</span>
                                <a href="javascipt:void(0)">Quisque Semper Nunc Vitae...</a>
                            </div>
                        </div>
                        <div class="recent-comment">
                            <div class="user-img">
                                <img class="img-full" src="assets/images/blog/user.jpg" alt="Kenne's Blog Image">
                            </div>
                            <div class="user-info">
                                <span>Kathy Young say:</span>
                                <a href="javascipt:void(0)">Thanks for the information, anyway :)</a>
                            </div>
                        </div>
                    </div>
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Tags</h4>
                        <ul class="kenne-tags_list">
                            <li><a href="javascript:void(0)">Shirt</a></li>
                            <li><a href="javascript:void(0)">Hoodie</a></li>
                            <li><a href="javascript:void(0)">Jacket</a></li>
                            <li><a href="javascript:void(0)">Scarf</a></li>
                            <li><a href="javascript:void(0)">Frocks</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row blog-item_wrap">
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="assets/images/blog/1.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">Blog Image Post</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                                    line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="kenne-element-carousel single-blog_slider arrow-style-2 overflow-hidden" data-slick-options='{
                            "slidesToShow": 1,
                            "slidesToScroll": 1,
                            "infinite": false,
                            "arrows": true,
                            "dots": false,
                            "spaceBetween": 30
                            }' data-slick-responsive='[
                            {"breakpoint":768, "settings": {
                            "slidesToShow": 1
                            }},
                            {"breakpoint":575, "settings": {
                            "slidesToShow": 1
                            }}
                        ]'>
                                <div class="single-item">
                                    <div class="blog-img">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/2.jpg" alt="Blog Image">
                                        </a>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="blog-img">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/3.jpg" alt="Blog Image">
                                        </a>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="blog-img">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/4.jpg" alt="Blog Image">
                                        </a>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="blog-img">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/5.jpg" alt="Blog Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">Post With Gallery</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                                    line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="assets/images/blog/3.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">When an unknown printer took.</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                                    line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="assets/images/blog/6.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">When an unknown printer took.</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                                    line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/256180869&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true">
                                </iframe>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">Post With Audio</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                                    line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/-lG0kDeuSJk" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">Post With Video</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                                    line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="assets/images/blog/4.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">When an unknown printer.</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                                    line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="assets/images/blog/5.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">When an unknown printer.</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                                    line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kenne-paginatoin-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="kenne-pagination-box primary-color">
                                        <li class="active"><a href="javascript:void(0)">1</a></li>
                                        <li><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">4</a></li>
                                        <li><a href="javascript:void(0)">5</a></li>
                                        <li><a class="Next" href="javascript:void(0)">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Blog Grid View Area End Here -->

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
