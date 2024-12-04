@extends('client::layouts.master')

@section('title')
    Giỏ hàng | Thời trang Phong cách Việt
@endsection

@section('contents')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Trang Chủ</a></li>
                    <li class="active">Giỏ Hàng</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="kenne-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th class="kenne-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="kenne-product-price">Đơn giá</th>
                                    <th class="kenne-product-quantity">Số lượng</th>
                                    <th class="kenne-product-subtotal">Tổng cộng</th>
                                    <th class="kenne-product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody id="cart-table-body">
                                {{-- <tr>
                                        <td class="kenne-product-thumbnail"><a href="javascript:void(0)"><img
                                                    src="assets/images/product/small-size/1.jpg"
                                                    alt="Uren's Cart Thumbnail"></a></td>
                                        <td class="kenne-product-name"><a href="javascript:void(0)">Juma rema pola</a></td>
                                        <td class="kenne-product-price"><span class="amount">$46.80</span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$46.80</span></td>
                                        <td class="kenne-product-remove"><a href="javascript:void(0)"><i class="fa fa-trash"
                                                    title="Remove"></i></a></td>
                                    </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                        placeholder="Mã giảm giá" type="text">
                                    <input class="button" name="apply_coupon" value="Áp dụng mã" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng giỏ hàng</h2>
                                <ul>
                                    <li>Tạm tính <span class="totalAmount">0 VNĐ</span></li>
                                    <li>Giảm giá : @session('discount_code')
                                            {{ session('discount_code') ? session('discount_code') : '' }}
                                        @endsession <span class="discount"> 0 VNĐ</span></li>
                                    <li>Tổng cộng <span class="total">0 VNĐ</span></li>
                                </ul>
                                <div class="btn-checkout">
                                    <a href="{{ route('cart.checkout') }}">Tiến hành thanh toán</a>

                                </div>
                                {{-- <a href="{{ route('cart.checkout') }}">Tiến hành thanh toán</a> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-setting')
    <script>
        $(document).ready(function() {

            function loadCartItems() {
                $.ajax({
                    url: '/cart/list',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('#minicart').empty();
                        response.cartItems.forEach(function(item) {
                            let product = item.product_variant.product;
                            let quantity = item.quantity;
                            let price = item.price;

                            let productHTML = `
                          <li class="minicart-product">
                                <a class="product-item_remove" href="javascript:void(0)" onclick="removeFromMiniCart(${item.id})"><i class="ion-android-close"></i></a>
                                <div class="product-item_img">
                                     <img src="{{ Storage::url('${product.image_avatar}') }}" alt="${product.name}">
                                </div>
                                <div class="product-item_content">
                                     <a class="product-item_title" href="shop-left-sidebar.html">${product.name}</a>
                                     <div>
                                        - Size: ${item.product_variant.size.size_value}
                                        <br>
                                        - Màu: <input type="color" value="${item.product_variant.color.color_value}" disabled>
                                    </div>
                                     <span class="product-item_quantity">${quantity} x ${formatVND(price)}</span>
                                </div>
                          </li>
                          `;
                            $('#minicart').append(productHTML);
                        });

                        $('#totalAmount').text(formatVND(response.totalAmount));
                    },
                    error: function(xhr, status, error) {
                        $('#minicart').empty();
                        // console.error('Giỏ hàng của bạn đang trống!:', error);
                    }
                });
            }

            function loadCartItemCount() {
                $.ajax({
                    url: '/cart/list',
                    method: 'GET',
                    success: function(response) {
                        var itemCount = response.cartItems.length;
                        $('.item-count').text(itemCount);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('.item-count').text(0);
                        // console.error("Lỗi khi lấy sản phẩm:", textStatus, errorThrown);
                    }
                });
            }

            function formatVND(amount) {
                return amount.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
            }
            // Hàm lấy danh sách sản phẩm trong giỏ hàng
            function fetchCartItems() {
                $.ajax({
                    url: '/cart/list', // API lấy danh sách giỏ hàng
                    type: 'GET',
                    dataType: 'json', // Định dạng dữ liệu trả về là JSON
                    success: function(response) {
                        if (response.message === "Lấy danh sách giỏ hàng thành công!") {
                            displayCartItems(response.cartItems); // Hiển thị các mặt hàng trong giỏ
                            // var itemCount = response.cartItems.length;
                            // $('.item-count').text(itemCount);
                            loadCartItems(); // Cập nhật sản phẩm trong minicart
                            loadCartItemCount(); // Cập nhật số lượng sản phẩm trong minicart


                        } else {
                            // $('.item-count').text(0);
                            console.error("Lỗi khi lấy danh sách giỏ hàng:", response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#cart-table-body').empty(); // Xóa nội dung  bảng giỏ hàng
                        $('.item-count').text(0);
                        loadCartItems();
                        loadCartItemCount();
                        $('#totalAmount').text(formatVND(0));

                        console.error("Yêu cầu AJAX thất bại:", textStatus, errorThrown);
                    }
                });
            }

            // Hàm định dạng giá tiền thành VNĐ
            function formatPrice(price) {
                return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " VNĐ";
            }

            // Hàm hiển thị danh sách sản phẩm trong giỏ hàng
            function displayCartItems(cartItems) {
                $('#cart-table-body').empty(); // Xóa nội dung cũ của bảng giỏ hàng
                cartItems.forEach(function(item) {
                    var row = `
                <tr>
                    <td class="kenne-product-thumbnail">
                        <a href="javascript:void(0)">
                            <img src="{{ Storage::url('${ item.product_image}') }}" alt="${item.product_id} Thumbnail" width="80" height="160">
                        </a>
                    </td>
                    <td class="kenne-product-name">
                        <a href="{{ route('shop.productDetail', '') }}/${item.product_variant.product.slug}">
                            ${item.product_variant.product.name}
                        </a>
                        <br>
                        <div>
                            - Size: ${item.product_variant.size.size_value}
                            <br>
                            - Màu: <input type="color" value="${item.product_variant.color.color_value}" disabled>
                        </div>
                    </td>
                    <td class="kenne-product-price">
                        <span class="amount">${formatPrice(item.price)}</span>
                    </td>
                    <td class="quantity">
                        <label>Số lượng</label>
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" data-id="${item.id}" value="${item.quantity}" type="number" min="1">
                            <button class="dec qtybutton" data-id="${item.id}" data-action="decrease">-</button>
                            <button class="inc qtybutton" data-id="${item.id}" data-action="increase">+</button>
                        </div>
                    </td>
                    <td class="product-subtotal">
                        <span class="amount">${formatPrice(item.total_price)}</span>
                    </td>
                    <td class="kenne-product-remove">
                        <a href="javascript:void(0)" onclick="removeFromCart(${item.id})">
                            <i class="fa fa-trash" title="Xóa"></i>
                        </a>
                    </td>
                </tr>
                `;
                    $('#cart-table-body').append(row); // Thêm hàng vào bảng
                });
            }

            // Gắn sự kiện cho nút tăng/giảm số lượng bằng Event Delegation
            $('#cart-table-body').on('click', '.qtybutton', function() {
                const itemId = $(this).data('id'); // Lấy ID sản phẩm
                const action = $(this).data('action'); // Lấy hành động (increase/decrease)
                const inputField = $(`input.cart-plus-minus-box[data-id="${itemId}"]`);
                let currentQuantity = parseInt(inputField.val());

                if (action === "increase") {
                    currentQuantity++; // Tăng số lượng
                } else if (action === "decrease" && currentQuantity > 1) {
                    currentQuantity--; // Giảm số lượng (không nhỏ hơn 1)
                } else {
                    return; // Không thực hiện nếu giảm dưới 1
                }

                inputField.val(currentQuantity); // Cập nhật giá trị trong ô input
                updateCartItemQuantity(itemId, currentQuantity); // Gửi yêu cầu cập nhật
            });

            // Gắn sự kiện thay đổi trực tiếp trong ô input
            $('#cart-table-body').on('change', '.cart-plus-minus-box', function() {
                const itemId = $(this).data('id'); // Lấy ID sản phẩm
                const newQuantity = parseInt($(this).val()); // Lấy số lượng mới

                if (newQuantity > 0) { // Chỉ xử lý nếu số lượng hợp lệ
                    updateCartItemQuantity(itemId, newQuantity); // Gửi yêu cầu cập nhật
                } else {
                    alert("Số lượng phải lớn hơn 0");
                    $(this).val(1); // Đặt lại giá trị về 1 nếu không hợp lệ
                    updateCartItemQuantity(itemId, 1); // Cập nhật lại số lượng là 1
                }
            });

            // Hàm cập nhật số lượng sản phẩm trong giỏ hàng
            function updateCartItemQuantity(itemId, quantity) {
                $.ajax({
                    type: 'POST',
                    url: '/cart/update/' + itemId, // API cập nhật số lượng
                    data: {
                        '_method': 'PUT', // Override phương thức HTTP thành PUT
                        'id': itemId, // ID sản phẩm
                        'quantity': quantity, // Số lượng mới
                        '_token': '{{ csrf_token() }}' // CSRF token
                    },
                    success: function(response) {
                        if (response.success) { // Nếu cập nhật thành công
                            console.log("Cập nhật số lượng thành công:", response.message);
                            fetchCartItems(); // Tải lại danh sách giỏ hàng
                            updateCartTotal(); // Cập nhật tổng tiền
                        } else {
                            console.error("Lỗi khi cập nhật số lượng:", response.message);
                            updateProductTotalPrice(itemId, quantity);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Lỗi khi cập nhật số lượng:", textStatus, errorThrown);
                    }
                });
            }

            // Hàm xóa một sản phẩm khỏi giỏ hàng
            window.removeFromCart = function(itemId) {
                $.ajax({
                    type: 'POST',
                    url: '/cart/remove/' + itemId, // API xóa sản phẩm
                    data: {
                        '_method': 'DELETE', // Override phương thức HTTP thành DELETE
                        'id': itemId, // ID sản phẩm
                        '_token': '{{ csrf_token() }}' // CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log("Xóa sản phẩm thành công:", response.message);
                            fetchCartItems(); // Tải lại danh sách giỏ hàng
                            updateCartTotal();
                            
                        } else {
                            console.error("Lỗi khi xóa sản phẩm:", response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Lỗi khi xóa sản phẩm:", textStatus, errorThrown);
                    }
                });
            };

            function updateCartTotal() {
                $.ajax({
                    url: '/cart/list', // API lấy tổng tiền giỏ hàng
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        discount = response.discount ? response.discount : 0;
                        totalAmount = response.totalAmount ? response.totalAmount : 0;
                        total = totalAmount - discount;
                        $('.cart-page-total ul li .totalAmount').text(formatPrice(
                            totalAmount)); // Cập nhật tổng tiền
                        $('.cart-page-total ul li .discount').text(formatPrice(
                            discount)); // Cập nhật giảm giá
                        $('.cart-page-total ul li .total').text(formatPrice(
                            total)); // Cập nhật tổng cộng


                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('.cart-page-total ul li .totalAmount').text(formatPrice(
                            0)); // Cập nhật tổng tiền
                        $('.cart-page-total ul li .discount').text(formatPrice(0)); // Cập nhật giảm giá
                        $('.cart-page-total ul li .total').text(formatPrice(0)); // Cập nhật tổng cộng
                        console.error("Yêu cầu AJAX thất bại:", textStatus, errorThrown);
                    }
                });
            }

            $('.button[name="apply_coupon"]').on('click', function(e) {
                e.preventDefault();
                var couponCode = $('#coupon_code').val();

                if (couponCode) {
                    $.ajax({
                        type: 'POST',
                        url: '/cart/apply-coupon', // API áp dụng mã giảm giá
                        data: {
                            'coupon_code': couponCode,
                            '_token': '{{ csrf_token() }}' // CSRF token
                        },
                        success: function(response) {
                            if (response.success) {
                                // alert("Áp dụng mã giảm giá thành công!");
                                alert(response.message);
                                updateCartTotal(); // Cập nhật tổng tiền giỏ hàng
                            } else {
                                // alert(response.message);
                                alert(response.message);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            
                            console.error("Lỗi khi áp dụng mã giảm giá:", textStatus,
                                errorThrown);
                        }
                    });
                } else {
                    alert("Vui lòng nhập mã giảm giá!");
                }
            });

            updateCartTotal();
            // Gọi hàm để tải danh sách giỏ hàng khi trang được tải
            fetchCartItems();

        });
    </script>
@endsection
