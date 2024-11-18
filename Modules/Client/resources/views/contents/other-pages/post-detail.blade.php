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
                    <li class="active">Tin tức</li>
                    <li class="active">{{$post->title}}</li>
                </ul>
            </div>
        </div>
    </div>
<div class="blog-details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <div class="kenne-blog-sidebar-wrapper">
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Tìm kiếm</h4>
                        <div class="search-form_area">
                            <form class="search-form" action="{{ route('other.posts.search') }}" method="POST">
                                @csrf
                                <input type="text" name="search_input" class="search-field"
                                    placeholder="Tìm kiếm ở đây">
                                <button type="submit" class="search-btn"><i class="ion-ios-search"></i></button>
                            </form>
                        </div>
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
                    </div>

                </div>
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="blog-item">
                    <div class="blog-img">
                        <a href="{{ route('other.postDetail', $post->slug_post ) }}">
                            <img src="{{ Storage::url($post->image_post) }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="heading">
                            <a href="{{ route('other.postDetail', $post->slug_post ) }}">{{$post->title}}</a>
                        </h3>
                        <p class="short-desc">
                            {{$post->short_description}}
                        </p>
                        <div class="blog-meta">
                            <ul>
                                <span class="post-date">{{$post->created_at->format('d/m/Y')}}</span>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="blog-additional_information">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection