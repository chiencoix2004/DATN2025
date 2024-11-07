{{-- @dd(Auth::user()) --}}
<header class="main-header_area">
    @include('client::assets.header-contents.transparent-header')
    @include('client::assets.header-contents.header-sticky')
    @include('client::assets.header-contents.header-miniCart')
    @include('client::assets.header-contents.header-mobileMenu')
<style>
    #search-results {
    position: absolute;
    width: 100%;
    background-color: #fff;
    border: 1px solid #ddd;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
}

#search-results div {
    padding: 10px;
    cursor: pointer;
}

#search-results div:hover {
    background-color: #f0f0f0;
}
</style>
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
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Đăng xuất</button>
                            </form>
                        </li>
                        <li><a href="{{ route('showForm') }}">Chi tiết tài khoản ,... Update sau </a></li>
                    </ul>
                @else
                    <ul class="offcanvas-component_menu">
                        <li><a href="{{ route('showForm') }}">Đăng ký</a></li>
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
                    <form action="{{ route('search') }}" method="POST" class="hm-searchbox">
                        @csrf
                        <input type="text" name="keywd" placeholder="Tìm kiếm tại đây ..." onkeyup="searchCustomer()" autocomplete="off" id="searchbar" required>
                        <div id="search-results" class="search-results"></div>

                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function searchCustomer() {
            let keyword = $('#searchbar').val();
            let crftoken = $('input[name="_token"]').val(); // Lấy CSRF token từ input ẩn
            if (keyword.length > 2) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/v1/hintseach',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ "keywd": keyword }),
                    success: function(data) {
                        let resultBox = $('#search-results');
                        resultBox.empty(); // Xóa kết quả trước đó
                        if (data.length > 0) {
                            data.forEach(function(item) {
                                resultBox.append('<div onclick="selectCustomer(\'' + item.name + '\')">' + item.name + '</div>');
                            });
                        } else {
                            resultBox.append('');
                        }
                    }
                });
            } else {
                $('#search-results').empty();
            }
        }

        function selectCustomer(keyword) {
            let crftoken = $('input[name="_token"]').val(); // Lấy lại CSRF token
            $.ajax({
                url: 'http://127.0.0.1:8000/search',
                method: 'POST',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': crftoken // Gửi token trong headers để bảo mật hơn
                },
                data: JSON.stringify({ "keywd": keyword }),
                success: function(response) {
                  //location to search page
                  window.location.href = 'search/' + keyword;

                }
            });
        }
    </script>

    <div class="global-overlay"></div>
</header>
