@extends('user::layouts.main')

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
            <h2>Product List</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Product List</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->

<!-- Begin Kenne's Content Wrapper Area -->
<div class="kenne-content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 order-2 order-lg-1">
                <div class="kenne-sidebar-catagories_area">
                    <div class="kenne-sidebar_categories">
                        <div class="kenne-categories_title first-child">
                            <h5>Filter by price</h5>
                        </div>
                        <div class="price-filter">
                            <div id="slider-range"></div>
                            <div class="price-slider-amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    <button class="filter-btn">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kenne-sidebar_categories category-module">
                        <div class="kenne-categories_title">
                            <h5>Product Categories</h5>
                        </div>
                        <div class="sidebar-categories_menu">
                            <ul>
                                <li class="has-sub"><a href="javascript:void(0)">Apparel<i class="ion-ios-plus-empty"></i></a>
                                    <ul>
                                        <li><a href="javascript:void(0)">Maxime</a></li>
                                        <li><a href="javascript:void(0)">Veniam Sed</a></li>
                                        <li><a href="javascript:void(0)">Praesentium</a></li>
                                        <li><a href="javascript:void(0)">Eligendi</a></li>
                                        <li><a href="javascript:void(0)">Maxime</a></li>
                                        <li><a href="javascript:void(0)">Ex deserunt</a></li>
                                        <li><a href="javascript:void(0)">Doloremque</a></li>
                                        <li><a href="javascript:void(0)">Facilis</a></li>
                                        <li><a href="javascript:void(0)">Cumque Magni</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Footwear</a></li>
                                <li class="has-sub"><a href="javascript:void(0)">Sportswear <i class="ion-ios-plus-empty"></i></a>
                                    <ul>
                                        <li><a href="javascript:void(0)">Daylesford</a></li>
                                        <li><a href="javascript:void(0)">Delaware</a></li>
                                        <li><a href="javascript:void(0)">Fayence</a></li>
                                        <li><a href="javascript:void(0)">Mable</a></li>
                                        <li><a href="javascript:void(0)">Mobo</a></li>
                                        <li><a href="javascript:void(0)">Pippins</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Traditional</a></li>
                                <li><a href="javascript:void(0)">Formal Wear</a></li>
                                <li class="has-sub"><a href="javascript:void(0)">Accessories <i class="ion-ios-plus-empty"></i></a>
                                    <ul>
                                        <li><a href="javascript:void(0)">Bedroom Furniture</a></li>
                                        <li><a href="javascript:void(0)">Chairs</a></li>
                                        <li><a href="javascript:void(0)">Coffee Tables</a></li>
                                        <li><a href="javascript:void(0)">Console Tables</a></li>
                                        <li><a href="javascript:void(0)">End Tables</a></li>
                                        <li><a href="javascript:void(0)">Living Room Sets</a></li>
                                        <li><a href="javascript:void(0)">Ottomans & Storage Ottomans</a></li>
                                        <li><a href="javascript:void(0)">Sofas & Couches</a></li>
                                        <li><a href="javascript:void(0)">TV Stands</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="javascript:void(0)">Watches & Jewelry <i class="ion-ios-plus-empty"></i></a>
                                    <ul>
                                        <li><a href="javascript:void(0)">Candleholders</a></li>
                                        <li><a href="javascript:void(0)">Candles</a></li>
                                        <li><a href="javascript:void(0)">Clocks</a></li>
                                        <li><a href="javascript:void(0)">Floor Mirrors</a></li>
                                        <li><a href="javascript:void(0)">Lamps & Lighting</a></li>
                                        <li><a href="javascript:void(0)">Rugs</a></li>
                                        <li><a href="javascript:void(0)">Runners</a></li>
                                        <li><a href="javascript:void(0)">Wall Decor</a></li>
                                        <li><a href="javascript:void(0)">Wall Mirrors</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="javascript:void(0)">Luggage <i class="ion-ios-plus-empty"></i></a>
                                    <ul>
                                        <li><a href="javascript:void(0)">Bowls</a></li>
                                        <li><a href="javascript:void(0)">Cups, Mugs & Saucers</a></li>
                                        <li><a href="javascript:void(0)">Cutting Boards</a></li>
                                        <li><a href="javascript:void(0)">Dinnerware Sets</a></li>
                                        <li><a href="javascript:void(0)">Flatware</a></li>
                                        <li><a href="javascript:void(0)">Glassware & Drinkware</a></li>
                                        <li><a href="javascript:void(0)">Knife Sets</a></li>
                                        <li><a href="javascript:void(0)">Plates</a></li>
                                        <li><a href="javascript:void(0)">Serveware</a></li>
                                    </ul>
                                </li>
                                <li class="has-sub"><a href="javascript:void(0)">Handbag <i class="ion-ios-plus-empty"></i></a>
                                    <ul>
                                        <li><a href="javascript:void(0)">Coffee & side tables</a></li>
                                        <li><a href="javascript:void(0)">Living room lighting</a></li>
                                        <li><a href="javascript:void(0)">Living room storage</a></li>
                                        <li><a href="javascript:void(0)">Living room textiles & rugs</a></li>
                                        <li><a href="javascript:void(0)">Sofas & armchairs</a></li>
                                        <li><a href="javascript:void(0)">TV & media furniture</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Cosmetic</a></li>
                                <li><a href="javascript:void(0)">Uncategorized</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="kenne-sidebar_categories">
                        <div class="kenne-categories_title">
                            <h5>Color</h5>
                        </div>
                        <ul class="sidebar-checkbox_list">
                            <li>
                                <a href="javascript:void(0)">Black (1)</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Blue (1)</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Gold (3)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="kenne-sidebar_categories list-product_area">
                        <div class="kenne-categories_title">
                            <h5>Recent Post</h5>
                        </div>
                        <div class="kenne-element-carousel list-product_slider list-product_slider-2 slider-nav" data-slick-options='{
                        "slidesToShow": 1,
                        "slidesToScroll": 1,
                        "infinite": false,
                        "arrows": false,
                        "dots": false,
                        "spaceBetween": 30,
                        "rows" : 2
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":576, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>

                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('detail_product')}}">
                                            <img class="primary-img" src="assets/images/product/1-1.jpg" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <span class="manufacture-product">hoodie, jacket</span>
                                            <h3 class="product-name"><a href="{{route('detail_product')}}">Quibusdam
                                                    ratione</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$46.91</span>
                                                <span class="old-price">$50.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('detail_product')}}">
                                            <img class="primary-img" src="assets/images/product/2-1.jpg" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <span class="manufacture-product">sleeveless, frocks</span>
                                            <h3 class="product-name"><a href="{{route('detail_product')}}">Quibusdam ratione</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$50.00</span>
                                                <span class="old-price">$65.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="assets/images/product/3-1.jpg" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <span class="manufacture-product">crochet, scarf</span>
                                            <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                    ratione</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$80.00</span>
                                                <span class="old-price">$85.0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="assets/images/product/4-1.jpg" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <span class="manufacture-product">shirts, t-shirt</span>
                                            <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                    ratione</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$75.91</span>
                                                <span class="old-price">$80.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="assets/images/product/2-1.jpg" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <span class="manufacture-product">sleeveless, frocks</span>
                                            <h3 class="product-name"><a href="single-product.html">Quibusdam ratione</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$50.00</span>
                                                <span class="old-price">$65.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="assets/images/product/3-1.jpg" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <span class="manufacture-product">crochet, scarf</span>
                                            <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                    ratione</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$80.00</span>
                                                <span class="old-price">$85.0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{route('detail_product')}}">
                                            <img class="primary-img" src="assets/images/product/1-1.jpg" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <span class="manufacture-product">hoodie, jacket</span>
                                            <h3 class="product-name"><a href="{{route('detail_product')}}">Quibusdam
                                                    ratione</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$46.91</span>
                                                <span class="old-price">$50.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img class="primary-img" src="assets/images/product/2-1.jpg" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <span class="manufacture-product">sleeveless, frocks</span>
                                            <h3 class="product-name"><a href="single-product.html">Quibusdam ratione</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">$50.00</span>
                                                <span class="old-price">$65.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="kenne-sidebar_categories">
                        <div class="kenne-categories_title kenne-tags_title">
                            <h5>Product Tags</h5>
                        </div>
                        <ul class="kenne-tags_list">
                            <li><a href="javascript:void(0)">Hoodie</a></li>
                            <li><a href="javascript:void(0)">Jacket</a></li>
                            <li><a href="javascript:void(0)">Frocks</a></li>
                            <li><a href="javascript:void(0)">Crochet</a></li>
                            <li><a href="javascript:void(0)">Scarf</a></li>
                            <li><a href="javascript:void(0)">Shirts</a></li>
                            <li><a href="javascript:void(0)">Men</a></li>
                            <li><a href="javascript:void(0)">Women</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                <div class="shop-toolbar">
                    <div class="product-view-mode">
                        <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                        <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                    </div>
                    <div class="product-page_count">
                        <p>Showing 1–9 of 40 results)</p>
                    </div>
                    <div class="product-item-selection_area">
                        <div class="product-short">
                            <label class="select-label">Short By:</label>
                            <select class="nice-select myniceselect">
                                <option value="1">Default sorting</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                                <option value="5">Rating (Highest)</option>
                                <option value="5">Rating (Lowest)</option>
                                <option value="5">Model (A - Z)</option>
                                <option value="5">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="shop-product-wrap grid gridview-3 row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/1-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/1-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">-15%</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="{{route('detail_product')}}">Quibusdam
                                                ratione</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/1-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Quibusdam
                                                ratione</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/2-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/2-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">Bestseller</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Expedita excepturi</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$50.91</span>
                                            <span class="old-price">$55.99</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/2-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$50.91</span>
                                            <span class="old-price">$55.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Expedita excepturi</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/3-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/3-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker-2">Hot</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Quibusdam
                                                ratione</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/3-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Quibusdam
                                                ratione</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/4-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/4-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">-15%</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Recusandae fugit</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$60.00</span>
                                            <span class="old-price">$65.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/4-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$60.00</span>
                                            <span class="old-price">$65.00</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Recusandae fugit</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/5-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/5-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">Bestseller</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Facere molestias</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$80.00</span>
                                            <span class="old-price">$85.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/5-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$80.00</span>
                                            <span class="old-price">$85.00</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Facere molestias</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/6-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/6-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker-2">Hot</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Rem voluptate</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$90.00</span>
                                            <span class="old-price">$95.00</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/6-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$90.00</span>
                                            <span class="old-price">$95.00</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Rem voluptate</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/7-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/7-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">-15%</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html">Cumque nulla</a></h3>
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/7-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$46.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Quibusdam
                                                ratione</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/8-1.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/8-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker">Bestseller</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$45.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h3 class="product-name"><a href="single-product.html">Aliquid vitae</a></h3>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/8-2.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$45.91</span>
                                            <span class="old-price">$50.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Aliquid vitae</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/5-2.jpg" alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/5-1.jpg" alt="Kenne's Product Image">
                                    </a>
                                    <span class="sticker-2">Hot</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                    class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$75.91</span>
                                            <span class="old-price">$80.99</span>
                                        </div>
                                        <h3 class="product-name"><a href="single-product.html">Assumenda delectus</a></h3>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-product_item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/5-1.jpg" alt="Kenne's Product Image">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <div class="price-box">
                                            <span class="new-price">$75.91</span>
                                            <span class="old-price">$80.99</span>
                                        </div>
                                        <h6 class="product-name"><a href="single-product.html">Assumenda delectus</a></h6>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-short_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim veniam, quis nostrud exercitation ullamco,Proin
                                                lectus ipsum, gravida et mattis vulputate, tristique ut lectus
                                            </p>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                    class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
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
<!-- Kenne's Content Wrapper Area End Here -->

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

<!-- Begin Kenne's Footer Area -->
<div class="kenne-footer_area bg-smoke_color">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="newsletter-area">
                        <div class="newsletter-logo">
                            <a href="javascript:void(0)">
                                <img src="assets/images/footer/logo/1.png" alt="Logo">
                            </a>
                        </div>
                        <p class="short-desc">Subscribe to our newsleter, Enter your emil address</p>
                        <div class="newsletter-form_wrap">
                            <form action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <div id="mc-form" class="mc-form subscribe-form">
                                        <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter email address" />
                                        <button class="newsletter-btn" id="mc-submit"><i
                                        class="ion-android-mail"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="row footer-widgets_wrap">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>Shopping</h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">Product</a></li>
                                    <li><a href="javascript:void(0)">My Cart</a></li>
                                    <li><a href="javascript:void(0)">Wishlist</a></li>
                                    <li><a href="javascript:void(0)">Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>Account</h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">Login</a></li>
                                    <li><a href="javascript:void(0)">Register</a></li>
                                    <li><a href="javascript:void(0)">Help</a></li>
                                    <li><a href="javascript:void(0)">Support</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="footer-widgets_title">
                                <h4>Categories</h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">Men</a></li>
                                    <li><a href="javascript:void(0)">Women</a></li>
                                    <li><a href="javascript:void(0)">Jeans</a></li>
                                    <li><a href="javascript:void(0)">Shoes</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright">
                        <span>Copyright &copy; 2023 <a href="javascript:void(0)">Kenne.</a> All rights reserved.</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment">
                        <img src="assets/images/footer/payment/1.png" alt="Kenne's Payment Method">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Footer Area End Here -->

 @endsection
