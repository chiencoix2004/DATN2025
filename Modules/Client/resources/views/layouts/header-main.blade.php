{{-- @dd(Auth::user()) --}}
<header class="main-header_area">
    @include('client::assets.header-contents.transparent-header')
    @include('client::assets.header-contents.header-sticky')
    @include('client::assets.header-contents.header-miniCart')
    @include('client::assets.header-contents.header-mobileMenu')

    <div class="offcanvas-menu_wrapper" id="offcanvasMenu">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="offcanvas-inner_logo">
                <a href="shop-left-sidebar.html">
                    <img src="{{ asset('theme/client/images/menu/logoF.png') }}" alt="Munoz's Offcanvas Logo">
                </a>
            </div>
            <div class="short-desc">
                <p>We are a team of designers and developers that create high quality HTML Template &
                    Woocommerce,
                    Shopify Themes.
                </p>
            </div>
            <div class="offcanvas-component">
                <span class="offcanvas-component_title">Ngôn ngữ</span>
                <ul class="offcanvas-component_menu">
                    <li class="active"><a href="javascript:void(0)">Tiếng Anh</a></li>
                    <li><a href="javascript:void(0)">Tiếng Việt</a></li>
                </ul>
            </div>
            <div class="offcanvas-component">
                <span class="offcanvas-component_title">Tài khoản của tôi</span>
                @if (Auth::user())
                    <ul class="offcanvas-component_menu">
                        <li>
                            <a href="{{ route('my-account') }}">Chi tiết tài khoản</a>
                        </li>
                        <li>
                            <a href="{{ route('password.change') }}">Đổi mật khẩu</a>
                        </li>
                        <li>
                            <a href="{{ route('listVoucher') }}">Danh sách voucher</a>
                        </li>
                        <br>
                        <hr>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Đăng xuất</button>
                            </form>
                        </li>
                        <br>
                        
                    </ul>
                @else
                    <ul class="offcanvas-component_menu">
                        <li><a href="{{ route('formReg') }}">Đăng ký</a></li>
                        <li><a href="{{ route('showForm') }}">Đăng nhập</a></li>
                    </ul>
                @endif
            </div>
            <div class="offcanvas-inner-social_link">
                <div class="kenne-social_link">
                    <ul>
                        <li class="facebook">
                            <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank"
                                title="Facebook">
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
                            <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank"
                                title="Google Plus">
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
    </div>
    <div class="offcanvas-search_wrapper" id="searchBar">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <div class="offcanvas-search">
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Tìm kiếm tại đây ...">
                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="global-overlay"></div>
</header>
