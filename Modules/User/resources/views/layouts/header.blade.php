<!-- Begin Loading Area -->
<div class="loading">
    <div class="text-center middle">
        <span class="loader">
    <span class="loader-inner"></span>
        </span>
    </div>
</div>
<!-- Loading Area End Here -->

<!-- Begin Main Header Area -->
<header class="main-header_area">
    <div class="transparent-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="transparent-header_nav position-relative">
                        <div class="header-logo_area">
                            <a href="{{ route('/') }}">
                                <img src="{{ asset('theme/user//images/rsz_2logo2.png') }}" alt="Header Logo">
                            </a>
                        </div>
                        <div class="main-menu_area d-none d-lg-block">
                            <nav class="main-nav d-flex justify-content-center">
                                <ul>
                                    <li class="dropdown-holder"><a href="{{ route('/') }}">Home </a>
                                        {{-- <ul class="kenne-dropdown">
                                            <li><a href="index.html">Home One</a></li>
                                            <li><a href="index-2.html">Home Two</a></li>
                                            <li><a href="index-3.html">Home Three</a></li>
                                        </ul> --}}
                                    </li>
                                    <li class="megamenu-holder position-static"><a href="{{route('product_list')}}">Shop <i class="ion-chevron-down"></i></a>
                                        <ul class="kenne-megamenu">
                                            <li><span class="megamenu-title">Shop Page Layout</span>
                                                <ul>
                                                    <li><a href="shop-fullwidth.html">Grid Fullwidth</a></li>
                                                    <li><a href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                    <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                    <li><a href="shop-list-fullwidth.html">List Fullwidth</a></li>
                                                    <li><a href="shop-list-left-sidebar.html">List Left Sidebar</a>
                                                    </li>
                                                    <li><a href="shop-list-right-sidebar.html">List Right
                                                            Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><span class="megamenu-title">Single Product Style</span>
                                                <ul>
                                                    <li><a href="single-product-gallery-left.html">Gallery Left</a>
                                                    </li>
                                                    <li><a href="single-product-gallery-right.html">Gallery
                                                            Right</a>
                                                    </li>
                                                    <li><a href="single-product-tab-style-left.html">Tab Style
                                                            Left</a>
                                                    </li>
                                                    <li><a href="single-product-tab-style-right.html">Tab Style
                                                            Right</a>
                                                    </li>
                                                    <li><a href="single-product-sticky-left.html">Sticky Left</a>
                                                    </li>
                                                    <li><a href="single-product-sticky-right.html">Sticky Right</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><span class="megamenu-title">Single Product Type</span>
                                                <ul>
                                                    <li><a href="single-product.html">Single Product</a></li>
                                                    <li><a href="single-product-sale.html">Single Product Sale</a>
                                                    </li>
                                                    <li><a href="single-product-group.html">Single Product Group</a>
                                                    </li>
                                                    <li><a href="single-product-variable.html">Single Product
                                                            Variable</a>
                                                    </li>
                                                    <li><a href="single-product-affiliate.html">Single Product
                                                            Affiliate</a>
                                                    </li>
                                                    <li><a href="single-product-slider.html">Single Product
                                                            Slider</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><span class="megamenu-title">Shop Related Pages</span>
                                                <ul>
                                                    <li><a href="{{route('my_account')}}">My Account</a></li>
                                                    <li><a href="{{route('login_register')}}">Login | Register</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="compare.html">Compare</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Pages <i class="ion-chevron-down"></i></a>
                                        <ul class="kenne-dropdown">
                                            <li><a href="coming-soon_page.html">Coming Soon</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('blog')}}">Blog </a>
                                        {{-- <i class="ion-chevron-down"></i> --}}
                                        {{-- <ul class="kenne-dropdown">
                                            <li><a href="blog-grid_view.html">Grid View</a></li>
                                            <li><a href="blog-list_view.html">List View</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul> --}}
                                    </li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right_area header-right_area-2">
                            <ul>
                                <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                    <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                        <i class="ion-android-menu"></i>
                                    </a>
                                </li>
                                <li class="minicart-wrap">
                                    <a href="#miniCart" class="minicart-btn toolbar-btn">
                                        <div class="minicart-count_area">
                                            <span class="item-count">03</span>
                                            <i class="ion-bag"></i>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#searchBar" class="search-btn toolbar-btn">
                                        <i class="ion-ios-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvasMenu" class="menu-btn toolbar-btn color--white d-none d-lg-block">
                                        <i class="ion-android-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sticky-header_nav position-relative">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-2 col-sm-6">
                                <div class="header-logo_area">
                                    <a href="index.html">
                                        <img src="{{ asset('theme/user//images/rsz_2logo2.png') }}" alt="Header Logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 d-none d-lg-block position-static">
                                <div class="main-menu_area">
                                    <nav class="main-nav d-flex justify-content-center">
                                        <ul>
                                            <li class="dropdown-holder"><a href="javascript:void(0)">Home <i class="ion-chevron-down"></i></a>
                                                <ul class="kenne-dropdown">
                                                    <li><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                </ul>
                                            </li>
                                            <li class="megamenu-holder position-static"><a href="shop-left-sidebar.html">Shop <i class="ion-chevron-down"></i></a>
                                                <ul class="kenne-megamenu">
                                                    <li><span class="megamenu-title">Shop Page Layout</span>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Grid Fullwidth</a></li>
                                                            <li><a href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                            <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                            <li><a href="shop-list-fullwidth.html">List Fullwidth</a></li>
                                                            <li><a href="shop-list-left-sidebar.html">List Left Sidebar</a>
                                                            </li>
                                                            <li><a href="shop-list-right-sidebar.html">List Right
                                                                    Sidebar</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><span class="megamenu-title">Single Product Style</span>
                                                        <ul>
                                                            <li><a href="single-product-gallery-left.html">Gallery Left</a>
                                                            </li>
                                                            <li><a href="single-product-gallery-right.html">Gallery
                                                                    Right</a>
                                                            </li>
                                                            <li><a href="single-product-tab-style-left.html">Tab Style
                                                                    Left</a>
                                                            </li>
                                                            <li><a href="single-product-tab-style-right.html">Tab Style
                                                                    Right</a>
                                                            </li>
                                                            <li><a href="single-product-sticky-left.html">Sticky Left</a>
                                                            </li>
                                                            <li><a href="single-product-sticky-right.html">Sticky Right</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><span class="megamenu-title">Single Product Type</span>
                                                        <ul>
                                                            <li><a href="single-product.html">Single Product</a></li>
                                                            <li><a href="single-product-sale.html">Single Product Sale</a>
                                                            </li>
                                                            <li><a href="single-product-group.html">Single Product Group</a>
                                                            </li>
                                                            <li><a href="single-product-variable.html">Single Product
                                                                    Variable</a>
                                                            </li>
                                                            <li><a href="single-product-affiliate.html">Single Product
                                                                    Affiliate</a>
                                                            </li>
                                                            <li><a href="single-product-slider.html">Single Product
                                                                    Slider</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><span class="megamenu-title">Shop Related Pages</span>
                                                        <ul>
                                                            <li><a href="{{route('my_account')}}">My Account</a></li>
                                                            <li><a href="{{route('login_register')}}">Login | Register</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="cart.html">Cart</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="compare.html">Compare</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:void(0)">Pages <i class="ion-chevron-down"></i></a>
                                                <ul class="kenne-dropdown">
                                                    <li><a href="coming-soon_page.html">Coming Soon</a></li>
                                                    <li><a href="404.html">Error 404</a></li>
                                                    <li><a href="faq.html">FAQ</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:void(0)">Blog <i class="ion-chevron-down"></i></a>
                                                <ul class="kenne-dropdown">
                                                    <li><a href="blog-grid_view.html">Grid View</a></li>
                                                    <li><a href="blog-list_view.html">List View</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="about-us.html">About Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="header-right_area header-right_area-2">
                                    <ul>
                                        <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                                <i class="ion-android-menu"></i>
                                            </a>
                                        </li>
                                        <li class="minicart-wrap">
                                            <a href="#miniCart" class="minicart-btn toolbar-btn">
                                                <div class="minicart-count_area">
                                                    <span class="item-count">03</span>
                                                    <i class="ion-bag"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#searchBar" class="search-btn toolbar-btn">
                                                <i class="ion-ios-search"></i>
                                            </a>
                                        </li>
                                        <li class="d-none d-lg-inline-block">
                                            <a href="#offcanvasMenu" class="menu-btn toolbar-btn color--white">
                                                <i class="ion-android-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Shopping Cart</h4>
                </div>
                <ul class="minicart-list">
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i
                            class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="assets/images/product/1-1.jpg" alt="Kenne's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Autem ipsa ad</a>
                            <span class="product-item_quantity">1 x $145.80</span>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i
                            class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="assets/images/product/2-1.jpg" alt="Kenne's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Tenetur illum
                                amet</a>
                            <span class="product-item_quantity">1 x $150.80</span>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i
                            class="ion-android-close"></i></a>
                        <div class="product-item_img">
                            <img src="assets/images/product/3-1.jpg" alt="Kenne's Product Image">
                        </div>
                        <div class="product-item_content">
                            <a class="product-item_title" href="shop-left-sidebar.html">Non doloremque
                                placeat</a>
                            <span class="product-item_quantity">1 x $165.80</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Subtotal</span>
                <span class="ammount">$462.4‬0</span>
            </div>
            <div class="minicart-btn_area">
                <a href="{{route('show_cart')}}" class="kenne-btn kenne-btn_fullwidth">Minicart</a>
            </div>
            <div class="minicart-btn_area">
                <a href="{{route('checkout')}}" class="kenne-btn kenne-btn_fullwidth">Checkout</a>
            </div>
        </div>
    </div>
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close white-close_btn"><i class="ion-android-close"></i></a>
                <div class="offcanvas-inner_logo">
                    <a href="{{ route('/') }}">
                        <li class="dropdown-holder">
                        <img src="{{ asset('theme/user//images/rsz_2logo2.png') }}" alt="Header Logo">
                    </a>
                </div>
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active"><a href="{{ route('/') }}"><span
                                class="mm-text">Home</span></a>
                            {{-- <ul class="sub-menu">
                                <li>
                                    <a href="index.html">
                                        <span class="mm-text">Home One</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-2.html">
                                        <span class="mm-text">Home Two</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index-3.html">
                                        <span class="mm-text">Home Three</span>
                                    </a>
                                </li>
                            </ul> --}}
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{route('product_list')}}">
                                <span class="mm-text">Shop</span>
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
                                <span class="mm-text">Pages</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="my-account.html">
                                        <span class="mm-text">About Us</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="my-account.html">
                                        <span class="mm-text">Contact</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('my_account')}}">
                                        <span class="mm-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('login_register')}}">
                                        <span class="mm-text">Login | Register</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="wishlist.html">
                                        <span class="mm-text">Wishlist</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="cart.html">
                                        <span class="mm-text">Cart</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="checkout.html">
                                        <span class="mm-text">Checkout</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="compare.html">
                                        <span class="mm-text">Compare</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="faq.html">
                                        <span class="mm-text">FAQ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="404.html">
                                        <span class="mm-text">Error 404</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <nav class="offcanvas-navigation user-setting_area">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children active">
                            <a href="#">
                                <span class="mm-text">User
                                Setting
                            </span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{route('my_account')}}">
                                        <span class="mm-text">My Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('login_register')}}">
                                        <span class="mm-text">Login | Register</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><span class="mm-text">Currency</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">EUR €</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">USD $</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#"><span class="mm-text">Language</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Romanian</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <span class="mm-text">Japanese</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="offcanvas-menu_wrapper" id="offcanvasMenu">
        <div class="offcanvas-menu-inner">
            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
            <div class="offcanvas-inner_logo">
                <a href="shop-left-sidebar.html">
                    <img src="{{ asset('theme/user//images/rsz_2logo2.png') }}" alt="Munoz's Offcanvas Logo">
                </a>
            </div>
            <div class="short-desc">
                <p>We are a team of designers and developers that create high quality HTML Template &
                    Woocommerce,
                    Shopify Themes.
                </p>
            </div>
            <div class="offcanvas-component first-child">
                <span class="offcanvas-component_title">Currency</span>
                <ul class="offcanvas-component_menu">
                    <li><a href="javascript:void(0)">EUR</a></li>
                    <li><a href="javascript:void(0)">GBP</a></li>
                    <li class="active"><a href="javascript:void(0)">USD</a></li>
                </ul>
            </div>
            <div class="offcanvas-component">
                <span class="offcanvas-component_title">Language</span>
                <ul class="offcanvas-component_menu">
                    <li class="active"><a href="javascript:void(0)">English</a></li>
                    <li><a href="javascript:void(0)">French</a></li>
                </ul>
            </div>
            <div class="offcanvas-component">
                <span class="offcanvas-component_title">My Account</span>
                <ul class="offcanvas-component_menu">
                    <li><a href="{{route('my_account')}}">My Account</a></li>
                    <li><a href="{{route('login_register')}}">Login</a></li>
                </ul>
            </div>
            <div class="offcanvas-inner-social_link">
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
    </div>
    <div class="offcanvas-search_wrapper" id="searchBar">
        <div class="offcanvas-menu-inner">
            <div class="container">
                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                <!-- Begin Offcanvas Search Area -->
                <div class="offcanvas-search">
                    <form action="#" class="hm-searchbox">
                        <input type="text" placeholder="Search for item...">
                        <button class="search_btn" type="submit"><i
                            class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
                <!-- Offcanvas Search Area End Here -->
            </div>
        </div>
    </div>
    <div class="global-overlay"></div>
</header>