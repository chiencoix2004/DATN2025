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
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's About Us Area -->
    <div class="about-us-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="overview-img text-center img-hover_effect">
                        <a href="#">
                            <img class="img-full" src="{{ asset('theme/client/images/about-us/1.jpg') }}"
                                alt="Kenne's About Us Image" style="width: 100%; height: 100%;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 d-flex align-items-center">
                    <div class="overview-content">
                        <h2>Chào mừng đến với <span>Fashion</span> Thời trang Phong cách Việt!</h2>
                        <p class="short_desc">Tại Fashion, chúng tôi tự hào mang đến cho bạn những 
                            sản phẩm thời trang chất lượng cao, kết hợp giữa xu hướng quốc tế và 
                            phong cách Việt Nam độc đáo. Được thành lập với sứ mệnh nâng tầm phong 
                            cách thời trang của người Việt, Fashion không chỉ là nơi bạn tìm thấy 
                            những bộ trang phục đẹp mà còn là nơi giúp bạn thể hiện cá tính và gu thẩm mỹ riêng.</p>
                        <div class="kenne-about-us_btn-area">
                            <a class="about-us_btn" href="{{ route('shop.shopIndex') }}">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Kenne's Team Area -->
    <div class="team-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title-2">
                        <h3>Về chúng tôi</h3>
                    </div>
                </div>
            </div> <!-- section title end -->
            <div class="col-12">
                <!-- Nội dung bài viết được truyền vào đây -->
                <div class="article-content">
                    <p>
                        Thời trang Phong cách Việt ra đời với mong muốn giúp khách hàng không chỉ đẹp mà còn tự tin 
                        hơn trong cuộc sống. Chúng tôi kết hợp những tinh hoa thời trang quốc tế với sự tinh tế, thanh lịch 
                        của phong cách Việt, mang đến các sản phẩm không chỉ là quần áo mà còn là một phần của câu chuyện cá nhân bạn.
                    </p>
                    <p>
                        Với đội ngũ thiết kế tài năng và tận tâm, mỗi sản phẩm tại Fashion đều được chăm chút tỉ mỉ từ khâu chọn nguyên liệu 
                        cho đến từng đường kim mũi chỉ. Chúng tôi tin rằng, thời trang không chỉ là sự lựa chọn mà còn là cách để bạn bộc lộ 
                        cá tính, tỏa sáng và ghi dấu ấn riêng trong mọi khoảnh khắc.
                    </p>
                    <p>
                        Hãy cùng chúng tôi lan tỏa thông điệp về phong cách sống hiện đại và sự tự tin từ bên trong. Tại Fashion, chúng tôi không chỉ 
                        bán sản phẩm mà còn đồng hành cùng bạn trên hành trình định hình phong cách sống.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title-2">
                        <h3>Vì sao chọn Fashion?</h3>
                    </div>
                </div>
            </div> <!-- section title end -->
            <div class="col-12">
                <!-- Nội dung bài viết được truyền vào đây -->
                <div class="article-content">
                    <p>
                        <strong>Thiết kế hiện đại:</strong> Các bộ sưu tập được cập nhật theo xu hướng mới nhất, mang đến sự tự tin và phong cách thời thượng cho mọi khách hàng.
                    </p>
                    <p>
                        <strong>Chất lượng vượt trội:</strong> Chúng tôi cam kết sử dụng chất liệu bền đẹp, an toàn và thân thiện với làn da.
                    </p>
                    <p>
                        <strong>Phong cách đa dạng:</strong> Phù hợp với nhiều hoàn cảnh, từ trang phục dạo phố, công sở đến dự tiệc sang trọng.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title-2">
                        <h3>Tầm nhìn và sứ mệnh</h3>
                    </div>
                </div>
            </div> <!-- section title end -->
            <div class="col-12">
                <!-- Nội dung bài viết được truyền vào đây -->
                <div class="article-content">
                    <p>
                        Fashion luôn hướng đến việc trở thành thương hiệu thời trang được yêu thích nhất 
                        tại Việt Nam, giúp khách hàng tự tin khẳng định phong cách và giá trị riêng của mình.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title-2">
                        <h3>Sứ mệnh và giá trị cốt lõi</h3>
                    </div>
                </div>
            </div> <!-- section title end -->
            <div class="col-12">
                <!-- Nội dung bài viết được truyền vào đây -->
                <div class="article-content">
                    <p>
                        Cung cấp sản phẩm thời trang chất lượng, đa dạng, phù hợp với nhiều phong cách.
                    </p>
                    <p>
                        Khuyến khích khách hàng tự tin thể hiện cá tính riêng thông qua thời trang.
                    </p>
                    <p>
                        Bảo vệ môi trường và duy trì sự bền vững trong ngành thời trang.
                    </p>
                    <p>
                        Đến với Fashion, bạn không chỉ tìm thấy các sản phẩm đẹp mắt mà còn trải nghiệm một phong cách sống đẳng cấp, đầy cảm hứng.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
