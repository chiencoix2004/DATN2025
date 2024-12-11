@extends('client::layouts.master')

@section('title')
    Yêu thích | Thời trang Phong cách Việt
@endsection
@section('css-setting')
@endsection
@section('contents')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="active">Yêu thích</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="kenne-wishlist_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="kenne-product_remove">Xóa</th>
                                        <th class="kenne-product-thumbnail">Ảnh</th>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="kenne-product-price">Giá</th>
                                        <th class="kenne-product-stock-status">Trạng thái</th>
                                        <th class="kenne-cart_btn">Hàng động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="kenne-product_remove"><a href="javascript:void(0)"><i
                                                            class="fa fa-trash" title="Remove"></i></a></td>
                                                @php
                                                    $url = $item->product->image_avatar;
                                                    if (!\Str::contains($url, 'http')) {
                                                        $url = \Storage::url($url);
                                                    }
                                                @endphp
                                                <td class="kenne-product-thumbnail"><a
                                                        href="{{ route('shop.productDetail', $item->product->slug) }}">
                                                        <img src="{{$url}}" width="200" alt="{{$item->product->slug}}"></a>
                                                </td>
                                                <td class="kenne-product-name">
                                                    <a
                                                        href="{{ route('shop.productDetail', $item->product->slug) }}">{{ $item->product->name }}</a>
                                                    - Size: {{ $item->productVariant->size->size_value }}
                                                    <br>
                                                    - Màu: <input type="color"
                                                        value="{{ $item->productVariant->color->color_value }}" disabled>
                                                </td>
                                                <td class="kenne-product-price"><span class="amount">£23.39</span></td>
                                                <td class="kenne-product-stock-status"><span class="in-stock">in
                                                        stock</span>
                                                </td>
                                                <td class="kenne-cart_btn"><a href="javascript:void(0)">add to cart</a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <div class="rating-box">
                                            <span class="reference text-warning">Hiện tại chưa có sản phẩm yêu thích
                                                nào!</span>
                                        </div>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-setting')
@endsection
