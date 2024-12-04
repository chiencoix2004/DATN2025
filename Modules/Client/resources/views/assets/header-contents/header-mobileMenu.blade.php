<div class="mobile-menu_wrapper" id="mobileMenu">
    <div class="offcanvas-menu-inner">
        <div class="container">
            <a href="#" class="btn-close white-close_btn"><i class="ion-android-close"></i></a>
            <div class="offcanvas-inner_logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('theme/client/images/menu/logoF.png') }}" alt="Header Logo">
                </a>
            </div>
            {{-- <nav class="offcanvas-navigation">
                <ul class="mobile-menu">
                    <li class="menu-item-has-children active">
                        <a href="{{ route('index') }}"><span class="mm-text">Trang chủ</span></a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('shop.shopIndex') }}">
                            <span class="mm-text">Cửa hàng</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children">
                                <a href="#">
                                    <span class="mm-text">Grid View</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="shop-fullwidth.html">
                                            <span class="mm-text">Grid Fullwidth</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-left-sidebar.html">
                                            <span class="mm-text">Left Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-right-sidebar.html">
                                            <span class="mm-text">Right Sidebar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">
                                    <span class="mm-text">Shop List</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="shop-list-fullwidth.html">
                                            <span class="mm-text">Full Width</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-list-left-sidebar.html">
                                            <span class="mm-text">Left Sidebar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shop-list-right-sidebar.html">
                                            <span class="mm-text">Right Sidebar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">
                                    <span class="mm-text">Single Product Style</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="single-product-gallery-left.html">
                                            <span class="mm-text">Gallery Left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-gallery-right.html">
                                            <span class="mm-text">Gallery Right</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-tab-style-left.html">
                                            <span class="mm-text">Tab Style Left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-tab-style-right.html">
                                            <span class="mm-text">Tab Style Right</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-sticky-left.html">
                                            <span class="mm-text">Sticky Left</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-sticky-right.html">
                                            <span class="mm-text">Sticky Right</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">
                                    <span class="mm-text">Single Product Type</span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="single-product.html">
                                            <span class="mm-text">Single Product</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-sale.html">
                                            <span class="mm-text">Single Product Sale</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-group.html">
                                            <span class="mm-text">Single Product Group</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-variable.html">
                                            <span class="mm-text">Single Product Variable</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-affiliate.html">
                                            <span class="mm-text">Single Product Affiliate</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-product-slider.html">
                                            <span class="mm-text">Single Product Slider</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">
                            <span class="mm-text">Blog</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children has-children">
                                <a href="blog-grid_view.html">
                                    <span class="mm-text">Grid View</span>
                                </a>
                            </li>
                            <li class="menu-item-has-children has-children">
                                <a href="blog-list_view.html">
                                    <span class="mm-text">List View</span>
                                </a>
                            </li>
                            <li class="menu-item-has-children has-children">
                                <a href="blog-details.html">
                                    <span class="mm-text">Blog Details</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#">
                            <span class="mm-text">Khác</span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('other.aboutUs') }}">
                                    <span class="mm-text">Giới thiệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('other.contactUs') }}">
                                    <span class="mm-text">Liên hệ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cart.list') }}">
                                    <span class="mm-text">Giỏ hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="compare.html">
                                    <span class="mm-text">So sánh</span>
                                </a>
                            </li>
                            <li>
                                <a href="faq.html">
                                    <span class="mm-text">FAQ</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav> --}}
            <nav class="offcanvas-navigation user-setting_area">
                <ul class="mobile-menu">
                    <li class="menu-item-has-children active">
                        <a href="#">
                            <span class="mm-text">
                                Tài khoản
                            </span>
                        </a>
                        <ul class="sub-menu">
                            @if (Auth::check())
                                <li>
                                    <a href="{{ route('my-account') }}">
                                        <span class="mm-text">Tài khoản của tôi</span>
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit">Đăng xuất</button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('showForm') }}">
                                        <span class="mm-text">Đăng nhập</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('formReg') }}">
                                        <span class="mm-text"> Đăng ký</span>
                                    </a>
                                </li>
                            @endif


                            {{-- <li>
                                <a href="checkout.html">
                                    <span class="mm-text">Thanh toán</span>
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                    {{-- <li class="menu-item-has-children">
                        <a href="#"><span class="mm-text">Ngôn ngữ</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <span class="mm-text">Tiếng Anh</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <span class="mm-text">Tiếng Việt</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </nav>
        </div>
    </div>
</div>
