@extends('client::layouts.master')

@section('title')
    Liên hệ | Thời trang Phong cách Việt
@endsection

@section('contents')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Liên hệ</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="contact-main-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Contact Us</h3>
                        <p class="contact-page-message">Claritas est etiam processus dynamicus, qui sequitur
                            mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum
                            claram anteposuerit litterarum formas human.</p>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Address</h4>
                            <p>123 Main Street, Anytown, CA 12345 – USA</p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Phone</h4>
                            <p>Mobile: (08) 123 456 789</p>
                            <p>Hotline: 1009 678 456</p>
                        </div>
                        <div class="single-contact-block last-child">
                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
                            <p>yourmail@domain.com</p>
                            <p>support@hastech.company</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Nói với chúng tôi vấn đề của bạn</h3>


                        <div class="contact-form">
                            @if (Auth::check()) 
                                <p>Xin chào, {{ Auth::user()->full_name }}</p>

                                <form id="contact-form" action="{{ route('other.contactUs.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tiêu đề <span class="required">*</span></label>
                                        <input type="text" name="title" id="title" required> 
                                    </div>
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    
                                    <div class="form-group">
                                        <label for="category" class="form-label">Loại yêu cầu <span class="required">*</span></label>
                                        <select class="form-select" id="category" name="category" required>
                                            <option value="">Chọn loại yêu cầu</option>
                                            <option value="account">Tài khoản</option>
                                            <option value="product">Sản phẩm</option>
                                            <option value="order">Đơn hàng</option>
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Loại yêu cầu <span class="required">*</span></label>
                                        <select name="category" id="category" required>
                                            <option value="">Chọn loại yêu cầu</option>
                                            <option value="technical">Hỗ trợ kỹ thuật</option>
                                            <option value="payment">Thanh toán</option>
                                            <option value="other">Khác</option>
                                        </select>
                                    </div> --}}

                                    @error('category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group form-group-2">
                                        <label>Lời nhắn của bạn <span class="required">*</span></label>
                                        <textarea name="content" id="content" required></textarea> 
                                    </div>

                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <button type="submit" value="submit" id="submit" class="kenne-contact-form_btn"
                                                name="submit">Gửi</button>
                                    </div>
                                </form>
                            @else
                                <p>Vui lòng <a href="{{ route('showForm') }}">đăng nhập</a> để gửi liên hệ.</p> 
                            @endif
                        </div>
                        <p class="form-message"></p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    @endsection