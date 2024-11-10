@extends('client::layouts.master')
@section('title')
    Danh sách voucher | Thời trang Phong cách Việt
@endsection
@section('contents')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Danh sách voucher</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-us-area">
        <div class="container">
            <form method="GET" action="{{ route('listVoucher') }}">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên hoặc mã" value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn btn-danger">Tìm kiếm</button>
            </form>  
            <div class="row">
                @foreach ($coupons as $coupon)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $coupon->name }}</h5>
                                <p class="card-text">Mã giảm giá: {{ $coupon->code }}</p>
                                <p class="card-text">Giảm giá: {{ $coupon->discount_amount }} {{ $coupon->discount_type == 'percent' ? '%' : 'VNĐ' }}</p>
                                <p class="card-text">Điều kiện: {{ $coupon->description }}</p>
                                <button type="submit" class="btn btn-primary">Sử dụng</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class='d-flex justify-content-center mt-3'>
                {{ $coupons->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
