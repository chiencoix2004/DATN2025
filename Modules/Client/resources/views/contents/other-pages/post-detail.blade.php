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
<div class="blog-details_area">
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
                <div class="blog-item">
                    <div class="blog-img">
                        <a href="{{ route('other.postDetail', ['id' => $post->id]) }}">
                            <img src="{{ Storage::url($post->image_post) }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="heading">
                            <a href="{{ route('other.postDetail', ['id' => $post->id]) }}">{{$post->title}}</a>
                        </h3>
                        <p class="short-desc">
                            The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a
                            line in section 1.10.32.
                        </p>
                        <div class="blog-meta">
                            <ul>
                                <li>{{$post->created_at}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="kenne-blog-blockquote">
                    <blockquote>
                        <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.
                        </p>
                    </blockquote>
                </div>
                <div class="blog-additional_information">
                    <p>{{$post->content}}
                    </p>
                </div>
                <div class="kenne-comment-section">
                    <h3>04 comment</h3>
                    <ul>
                        <li>
                            <div class="author-avatar">
                                <img src="assets/images/blog/user.jpg" alt="User">
                            </div>
                            <div class="comment-body">
                                <span class="reply-btn"><a href="javascript:void(0)">reply</a></span>
                                <h5 class="comment-author">Kathy Young</h5>
                                <div class="comment-post-date">
                                    25 Oct, 2019 at 10:30am
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci
                                    optio ex,
                                    laboriosam
                                    facilis non pariatur itaque illo sunt?</p>
                            </div>
                        </li>
                        <li class="comment-children">
                            <div class="author-avatar">
                                <img src="assets/images/blog/admin.jpg" alt="Admin">
                            </div>
                            <div class="comment-body">
                                <span class="reply-btn"><a href="javascript:void(0)">reply</a></span>
                                <h5 class="comment-author">HasTech</h5>
                                <div class="comment-post-date">
                                    25 Oct, 2019 at 11:00am
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci
                                    optio ex,
                                    laboriosam
                                    facilis non pariatur itaque illo sunt?</p>
                            </div>
                        </li>
                        <li>
                            <div class="author-avatar">
                                <img src="assets/images/blog/user.jpg" alt="User">
                            </div>
                            <div class="comment-body">
                                <span class="reply-btn"><a href="javascript:void(0)">reply</a></span>
                                <h5 class="comment-author">Kathy Young</h5>
                                <div class="comment-post-date">
                                    25 Oct, 2019 at 06:50pm
                                </div>
                                <p>Thank You :)</p>
                            </div>
                        </li>
                        <li class="comment-children">
                            <div class="author-avatar">
                                <img src="assets/images/blog/admin.jpg" alt="Admin">
                            </div>
                            <div class="comment-body">
                                <span class="reply-btn"><a href="javascript:void(0)">reply</a></span>
                                <h5 class="comment-author">HasTech</h5>
                                <div class="comment-post-date">
                                    25 Oct, 2019 at 11:00am
                                </div>
                                <p>Your Welcome ^^</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="kenne-blog-comment-wrapper">
                    <h3>leave a reply</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <form action="javascript:void(0)">
                        <div class="comment-post-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>comment</label>
                                    <textarea name="commnet" placeholder="Write a comment"></textarea>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label>Name</label>
                                    <input type="text" class="coment-field" placeholder="Name">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label>Email</label>
                                    <input type="text" class="coment-field" placeholder="Email">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label>Website</label>
                                    <input type="text" class="coment-field" placeholder="Website">
                                </div>
                                <div class="col-lg-12">
                                    <div class="comment-btn_wrap f-left">
                                        <div class="kenne-btn-ps_left">
                                            <a class="kenne-btn transparent-btn transparent-btn-2" href="javascript:void(0)">Post comment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection