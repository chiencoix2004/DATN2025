@extends('client::layouts.master')


@section('title')
    Tài khoản | Thời trang Phong cách Việt
@endsection
@section('css-setting')
    <style>
        .pagination-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }


        .pagination-controls button {
            background-color: #000000;
            color: white;
            border: none;
            padding: 8px 12px;
            margin: 0 5px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }


        .pagination-controls .page-number.active {
            background-color: #a8741a;
            font-weight: bold;
        }


        .pagination-controls button:hover:not(.active) {
            background-color: #a8741a;
        }


        .pagination-controls button:disabled {
            background-color: #dcdcdc;
            cursor: not-allowed;
        }

        .pagination-controls .page-info {
            font-size: 14px;
            color: #333;
            margin: 0 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            position: relative;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
@endsection
@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="margin-top: 30px;">Thời trang Phong cách Việt</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">Tài khoản</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Page Content Area -->
    <main class="page-content">
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab"
                                    href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                    aria-selected="true">Bảng điều khiển</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders"
                                    role="tab" aria-controls="account-orders" aria-selected="false">Đơn hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-address-tab" data-bs-toggle="tab" href="#account-address"
                                    role="tab" aria-controls="account-address" aria-selected="false">Địa chỉ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details"
                                    role="tab" aria-controls="account-details" aria-selected="false">Chi tiết tài
                                    khoản</a>
                            </li>
                            <li class="nav-item">
                                {{-- <a class="nav-link" id="account-logout-tab" href="login-register.html" role="tab"
                                    aria-selected="false">Logout</a> --}}
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="kenne-login_btn">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-dashboard">
                                    <p>Xin chào <b>Edwin Adams</b> (không phải Edwin Adams? <a
                                            href="login-register.html">Đăng xuất</a>)</p>
                                    <p>Từ bảng điều khiển tài khoản của bạn, bạn có thể xem các đơn hàng gần đây, quản lý
                                        địa chỉ giao hàng và thanh toán của bạn và <a href="javascript:void(0)">chỉnh sửa
                                            mật khẩu và chi tiết tài khoản</a>.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">Đơn hàng của tôi</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">

                                            <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Ngày</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng</th>
                                                    <th></th>
                                                </tr>

                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="pagination-controls" class="pagination-controls"></div>
                                </div>
                                <div id="orderDetailsModal" class="modal" style="display: none;">
                                    <div class="modal-content">
                                        <span class="close-button" onclick="closeModal()">&times;</span>

                                        <!-- Container Chi tiết Đơn hàng -->
                                        <div id="order-details-content">
                                            <h4 class="header-title mb-3">Sản phẩm từ Đơn hàng #<span id="order-id"></span>
                                            </h4>
                                            <h5 class="header-title mb-3">Trạng thái : <span id="order-status"></span>
                                            </h5>

                                            <div class="row mb-4">
                                                <!-- Bảng Sản phẩm Đơn hàng -->
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Sản phẩm</th>
                                                                <th>Số lượng</th>
                                                                <th>Giá</th>
                                                                <th>Tổng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="order-items">
                                                            <!-- Sản phẩm đơn hàng sẽ được chèn vào đây -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row mb-4">

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <!-- Thông tin Giao hàng -->
                                                    <h4 class="header-title mb-3">Thông tin người nhận</h4>
                                                    <address id="shipping-info">
                                                        <!-- Chi tiết giao hàng sẽ được chèn vào đây -->
                                                    </address>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <!-- Thông tin Thanh toán -->
                                                    <h4 class="header-title mb-3">Thông tin Thanh toán</h4>
                                                    <ul id="billing-info" class="list-unstyled mb-0">
                                                        <!-- Chi tiết thanh toán sẽ được chèn vào đây -->
                                                    </ul>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <!-- Thông tin Giao hàng -->
                                                    <h4 class="header-title mb-3">Thông tin Giao hàng</h4>
                                                    <div id="delivery-info">
                                                        <!-- Chi tiết giao hàng sẽ được chèn vào đây -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <!-- Tóm tắt Đơn hàng -->
                                                    <h4 class="header-title mb-3">Tóm tắt Đơn hàng</h4>
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <tbody id="order-summary">
                                                                <!-- Tóm tắt đơn hàng sẽ được chèn vào đây -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="account-address" role="tabpanel"
                                aria-labelledby="account-address-tab">
                                <div class="myaccount-address">
                                    <p>Địa chỉ sau sẽ được sử dụng trên trang thanh toán theo mặc định.</p>
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="small-title">Địa chỉ thanh toán</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                        <div class="col">
                                            <h4 class="small-title">Địa chỉ giao hàng</h4>
                                            <address>
                                                1234 Heaven Stress, Beverly Hill OldYork UnitedState of Lorem
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details" role="tabpanel"
                                aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form action="#" class="kenne-form">
                                        <div class="kenne-form-inner">
                                            <div class="single-input single-input-half">
                                                <label for="account-details-firstname">First Name*</label>
                                                <input type="text" id="account-details-firstname">
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="account-details-lastname">Last Name*</label>
                                                <input type="text" id="account-details-lastname">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-email">Email*</label>
                                                <input type="email" id="account-details-email">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-oldpass">Current Password(leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-oldpass">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-newpass">New Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-newpass">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-confpass">Confirm New Password</label>
                                                <input type="password" id="account-details-confpass">
                                            </div>
                                            <div class="single-input">
                                                <button class="kenne-btn kenne-btn_dark" type="submit"><span>SAVE
                                                        CHANGES</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kenne's Account Page Area End Here -->
    </main>

    <!-- Begin Brand Area -->
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
    <!-- Brand Area End Here -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function loadOrders(pageUrl = '/get-orders') {
                fetch(pageUrl, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.querySelector('.myaccount-orders tbody');
                        tableBody.innerHTML = ''; // Xóa các hàng hiện có

                        if (data.orders && data.orders.length > 0) {
                            data.orders.forEach(order => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                        <td><a class="account-order-id" href="javascript:void(0)">#${order.id}</a></td>
                                        <td>${order.date}</td>
                                        <td>${order.status}</td>
                                        <td>${order.total}</td>
                                        <td><a href="javascript:void(0)" class="kenne-btn kenne-btn_sm view-order-btn" data-order-id="${order.id}"><span>View</span></a></td>
                                    `;
                                tableBody.appendChild(row);
                            });

                            // Thêm sự kiện click vào mỗi nút "Xem"
                            document.querySelectorAll('.view-order-btn').forEach(button => {
                                button.addEventListener('click', function() {
                                    const orderId = this.getAttribute('data-order-id');
                                    openOrderDetails(orderId);
                                });
                            });

                            updatePagination(data.pagination);
                        } else {
                            tableBody.innerHTML = '<tr><td colspan="5">Không tìm thấy đơn hàng nào.</td></tr>';
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi khi lấy đơn hàng:', error);
                    });
            }

            // Cập nhật các nút phân trang dựa trên dữ liệu phản hồi
            function updatePagination(pagination) {
                const paginationContainer = document.querySelector('#pagination-controls');
                paginationContainer.innerHTML = ''; // Xóa các điều khiển phân trang hiện có

                // Tạo nút "Trước"
                const prevButton = document.createElement('button');
                prevButton.textContent = 'Trước';
                prevButton.disabled = !pagination.prev_page_url;
                prevButton.onclick = () => loadOrders(pagination.prev_page_url ||
                    `/get-orders?page=${pagination.current_page - 1}`);
                paginationContainer.appendChild(prevButton);

                // Thêm các nút trang được đánh số
                for (let i = 1; i <= pagination.last_page; i++) {
                    const pageButton = document.createElement('button');
                    pageButton.textContent = i;
                    pageButton.className = 'page-number';

                    // Làm nổi bật nút trang hiện tại
                    if (i === pagination.current_page) {
                        pageButton.classList.add('active');
                    }

                    // Đặt sự kiện click để tải trang cụ thể
                    pageButton.onclick = () => loadOrders(`/get-orders?page=${i}`);
                    paginationContainer.appendChild(pageButton);
                }

                // Tạo nút "Tiếp"
                const nextButton = document.createElement('button');
                nextButton.textContent = 'Tiếp';
                nextButton.disabled = !pagination.next_page_url;
                nextButton.onclick = () => loadOrders(pagination.next_page_url ||
                    `/get-orders?page=${pagination.current_page + 1}`);
                paginationContainer.appendChild(nextButton);

                // Hiển thị thông tin trang hiện tại
                const pageInfo = document.createElement('span');
                pageInfo.className = 'page-info';
                pageInfo.textContent = `Trang ${pagination.current_page} của ${pagination.last_page}`;
                paginationContainer.appendChild(pageInfo);
            }

            // Tải đơn hàng ban đầu
            loadOrders();
        });

        function openOrderDetails(orderId) {
            // Hiển thị modal
            document.getElementById('orderDetailsModal').style.display = 'block';

            // Lấy chi tiết đơn hàng qua AJAX
            fetch(`/get-order-details/${orderId}`)
                .then(response => response.json())
                .then(data => {
                    // Đặt ID Đơn hàng
                    document.getElementById('order-id').textContent = data.id;
                    document.getElementById('order-status').textContent = data.status;

                    // Điền thông tin sản phẩm đơn hàng
                    const itemsContainer = document.getElementById('order-items');
                    itemsContainer.innerHTML = data.items.map(item => `
            <tr>
                <td><img src="{{ Storage::url('${item.image}') }}" alt="Hình ảnh sản phẩm" style="width: 50px; height: 50px;"> ${item.name}</td>
                <td>${item.quantity}</td>
                <td>${item.price} VND</td>
                <td>${item.total} VND</td>
            </tr>
            `).join('');

                    // Điền thông tin tóm tắt đơn hàng
                    const summaryContainer = document.getElementById('order-summary');
                    summaryContainer.innerHTML = `
            <tr><td>Tổng cộng :</td><td>${data.grand_total}</td></tr>
            <tr><td>Giảm giá :</td><td>${data.discount}</td></tr>
            <tr><th>Tổng :</th><th>${data.total}</th></tr>
            `;

                    // Điền thông tin giao hàng
                    document.getElementById('shipping-info').innerHTML = `
            <strong>Tên người nhận :</strong> ${data.shipping.name}<br>
            <strong>Địa chỉ :</strong> ${data.shipping.address}<br>
            <strong>Email :</strong> ${data.shipping.email}<br>
            <strong>Số điện thoại :</strong> ${data.shipping.phone}
            `;

                    // Điền thông tin thanh toán
                    const billingInfo = document.getElementById('billing-info');
                    billingInfo.innerHTML = `
            <li><p><strong>Loại thanh toán:</strong> ${data.billing.payment_method}</p></li>
            <li><p><strong>Trạng thái thanh toán:</strong> ${data.billing.status_payment}</p></li>
            `;

                    // Điền thông tin giao hàng
                    document.getElementById('delivery-info').innerHTML = `
            <i class="mdi mdi-truck-fast h2 text-muted"></i>
            <p><strong>ID Đơn hàng :</strong> ${data.delivery.order_id}</p>
            <p><strong>Phương thức vận chuyển :</strong> ${data.delivery.shipping_method}</p>
            `;
                })
                .catch(error => {
                    console.error('Lỗi khi lấy chi tiết đơn hàng:', error);
                });
        }

        // Hàm đóng modal
        function closeModal() {
            document.getElementById('orderDetailsModal').style.display = 'none';
        }


        // Thêm sự kiện click vào mỗi nút "Xem"
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.view-order-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-order-id');
                    openOrderDetails(orderId);
                });
            });
        });
    </script>
@endsection
