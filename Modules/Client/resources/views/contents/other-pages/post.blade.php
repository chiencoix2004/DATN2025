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
                        @if (!isset($data))
                            <div class="kenne-blog-sidebar">
                                <h4 class="kenne-blog-sidebar-title">Tin tức gần đây</h4>
                                @foreach ($posts as $item)
                                    <div class="recent-post">
                                        <div class="recent-post_thumb">
                                            <a href="{{ route('other.postDetail', $item->slug_post) }}">
                                                <img class="img-full" src="{{ Storage::url($item->image_post) }}"
                                                    alt="{{ $item->title }}">
                                            </a>
                                        </div>
                                        <div class="recent-post_desc">
                                            <span><a
                                                    href="{{ route('other.postDetail', $item->slug_post) }}">{{ $item->title }}</a></span>
                                            <span class="post-date">{{ $item->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                    <p></p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="row blog-item_wrap">
                        @if (isset($data))
                            <div class="col-12">
                                <div class="blog-item">
                                    <div class="blog-img">
                                        <a href="{{ route('other.postDetail', $data->slug_post) }}">
                                            <img src="{{ Storage::url($data->image_post) }}" alt="{{ $data->title }}">
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="heading">
                                            <a
                                                href="{{ route('other.postDetail', $data->slug_post) }}">{{ $data->title }}</a>
                                        </h3>
                                        <p class="short-desc">
                                            {{-- {{ Str::limit(strip_tags($item->content), 100, '...') }} --}}
                                            {!! Str::limit($data->short_description, 150) !!}
                                        </p>
                                        <div class="blog-meta">
                                            <ul>
                                                <li>{{ $data->created_at->format('d/m/Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($posts as $item)
                                <div class="col-12">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="{{ route('other.postDetail', $item->slug_post) }}">
                                                <img src="{{ Storage::url($item->image_post) }}"
                                                    alt="{{ $item->title }}">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="heading">
                                                <a
                                                    href="{{ route('other.postDetail', $item->slug_post) }}">{{ $item->title }}</a>
                                            </h3>
                                            <p class="short-desc">
                                                {{-- {{ Str::limit(strip_tags($item->content), 100, '...') }} --}}
                                                {!! Str::limit($item->short_description, 250) !!}
                                            </p>
                                            <div class="blog-meta">
                                                <ul>
                                                    <li>{{ $item->created_at->format('d/m/Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @if (!isset($data))
                <div class="row">
                    <div class="col-lg-12">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
