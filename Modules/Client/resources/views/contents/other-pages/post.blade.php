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
    <div class="list-view_area latest-blog_area-2">
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
                        @foreach ($posts as $item)
                        <div class="col-12">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <a href="{{ route('other.postDetail', ['id' => $item->id]) }}">
                                        <img src="{{ Storage::url($item->image_post) }}" height="200px" width="350px" alt="{{ $item->title }}">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="heading">
                                        <a href="{{ route('other.postDetail', ['id' => $item->id]) }}">{{$item->title}}</a>
                                    </h3>
                                    <p class="short-desc">
                                        {{$item->content}}
                                    </p>
                                    <div class="blog-meta">
                                        <ul>
                                            <li>Oct.20.2019</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
@endsection
