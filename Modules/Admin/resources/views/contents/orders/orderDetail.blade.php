@extends('admin::layout.master')

@section('title')
    Detail Order
@endsection

@section('contents')
    @if (session('success'))
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0 text-success">{{ session('success') }}</h5>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0 text-danger">{{ session('error') }}</h5>
            </div>
        </div>
    @endif
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('theme/admin/img/icons/spot-illustrations/corner-4.png') }});opacity: 0.7;">
        </div>
        <form class="card-body position-relative" action="{{ route('admin.orders.update', $data) }}" method="POST">
            @csrf
            @method('PUT')
            <h5>Đơn hàng chi tiết: #{{ $data->id }}</h5>
            <p class="fs-10">{{ $data->date_create_order }}</p>
            <div>
                @php
                    $badgeColors = [
                        $statusOrder['reorder'] => 'warning',
                        $statusOrder['pending'] => 'secondary',
                        $statusOrder['confirmed'] => 'info',
                        $statusOrder['shipping'] => 'primary',
                        $statusOrder['received'] => 'success',
                        $statusOrder['canceled'] => 'danger',
                        $statusPayment['paid'] => 'success',
                        $statusPayment['unpaid'] => 'danger',
                    ];
                @endphp
                <strong class="me-2">Trạng thái đơn hàng: </strong>
                <div class="badge rounded-pill badge-subtle-{{ $badgeColors[$data->status_order] }} fs-11">
                    {{ $data->status_order }}
                </div>
                @if (
                    $data->status_order != \App\Models\Order::STATUS_ORDER['received'] &&
                        $data->status_order != \App\Models\Order::STATUS_ORDER['shipping'] &&
                        $data->status_order != \App\Models\Order::STATUS_ORDER['canceled']
                )
                    <select class="form-control" name="status_order" style="margin: 17px 0px 17px 0px; width: 300px;">
                        <option value="sltNull" selected>Chọn</option>
                        @foreach (\App\Models\Order::STATUS_ORDER as $key => $value)
                            @if ($key == 'received' || $key == 'canceled')
                                <?php continue; ?>
                            @endif
                            <option value="{{ $key }}" {{ $data->status_order == $value ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
                    <!-- Modal trigger button -->
                    @if($data->status_payment == 'Đã thanh toán')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId">
                        Hủy và hoàn tiền đơn hàng
                    </button>
                    @else
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId1">
                        Hủy đơn hàng
                    </button>
                    @endif

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Xác nhận hủy và hoàn tiền đơn hàng
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.orders.cancelAndRefund', $data) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="reason">Lý do hủy đơn hàng</label>
                                            <textarea class="form-control" name="reason" id="reason" rows="3"
                                                required></textarea>
                                            <input type="hidden" name="status_order" value="canceled">
                                            <input type="hidden" name="order_id" value="{{ $data->id }}">
                                            <input type="hidden" name="user_id" value="{{ $data->users_id }}">
                                            <input type="hidden" name="total_price" value="{{ $data->total_price }}">
                                            <input type="hidden" name="full_name" value="{{ $data->user_name }}">
                                        </div>
                                        <p class="text-danger">Lưu ý: Hủy đơn hàng sẽ không thể khôi phục lại</p>

                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Quay lại
                                    </button>
                                    <button type="submit" class="btn btn-primary">Hủy đơn hàng và hoàn tiền</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalId1" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Xác nhận hủy đơn hàng
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.orders.cancel', $data) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="reason">Lý do hủy đơn hàng</label>
                                            <textarea class="form-control" name="reason" id="reason" rows="3"
                                                required></textarea>
                                            <input type="hidden" name="status_order" value="canceled">
                                            <input type="hidden" name="order_id" value="{{ $data->id }}">
                                        </div>
                                        <p class="text-danger">Lưu ý: Hủy đơn hàng sẽ không thể khôi phục lại</p>

                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Quay lại
                                    </button>
                                    <button type="submit" class="btn btn-primary">Hủy đơn hàng</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Optional: Place to the bottom of scripts -->
                @endif
            </div>

    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3 fs-9">Người đặt đơn</h5>
                    <h6 class="mb-2">{{ $data->user_name }}</h6>
                    <p class="mb-1 fs-10">{{ $data->user_address }}</p>
                    <p class="mb-0 fs-10"> <strong>Email: </strong><a
                            href="mailto:{{ $data->user_email }}">{{ $data->user_email }}</a>
                    </p>
                    <p class="mb-0 fs-10"> <strong>Điện thoại: </strong><a
                            href="tel:{{ $data->user_phone }}">{{ $data->user_phone }}</a></p>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3 fs-9">Người nhận hàng</h5>
                    <h6 class="mb-2">{{ $data->ship_user_name }}</h6>
                    <p class="mb-0 fs-10">{{ $data->ship_user_address }}</p>
                    <p class="mb-0 fs-10"> <strong>Email: </strong><a
                            href="mailto:{{ $data->ship_user_email }}">{{ $data->ship_user_email }}</a>
                    </p>
                    <p class="mb-0 fs-10"> <strong>Điện thoại: </strong><a
                            href="tel:{{ $data->ship_user_phone }}">{{ $data->ship_user_phone }}</a></p>
                    <div class="mb-0 fs-10">Ghi chú đơn hàng:<strong> {{ $data->ship_user_note }} </strong></div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3 fs-9">Phương thức thanh toán</h5>
                    <h6 class="mb-2">{{ $data->payment_method }}</h6>
                    <strong class="me-2">Trạng thái thanh toán: </strong>
                    <div
                        class="mb-0 fs-10 badge rounded-pill badge-subtle-{{ $badgeColors[$data->status_payment] }} fs-11">
                        {{ $data->status_payment }}
                    </div>
                </div>
                {{-- <div class="col-md-6 col-lg-4">
                    <h5 class="mb-3 fs-9">Payment Method</h5>
                    <div class="d-flex"><img class="me-3" src="../../../assets/img/icons/visa.png" width="40"
                            height="30" alt="" />
                        <div class="flex-1">
                            <h6 class="mb-0">Antony Hopkins</h6>
                            <p class="mb-0 fs-10">**** **** **** 9809</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive fs-10">
                <table class="table table-striped border-bottom">
                    <thead class="bg-200">
                        <tr>
                            <th class="text-900 border-0">Sản phẩm</th>
                            <th class="text-900 border-0 text-center">Ảnh</th>
                            <th class="text-900 border-0 text-center">Option</th>
                            <th class="text-900 border-0 text-center">Số lượng</th>
                            <th class="text-900 border-0 text-end">Đơn giá (VNĐ)</th>
                            <th class="text-900 border-0 text-end">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->orderItems as $itemOrder)
                            <tr class="border-200">
                                <td class="align-middle">
                                    <h6 class="mb-0 text-nowrap">{{ $itemOrder->product_name }}</h6>
                                    <p class="mb-0">{{ $itemOrder->product_sku }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    @php
                                        $url = $itemOrder->product_avatar;
                                        if (!\Str::contains($url, 'http')) {
                                            $url = \Storage::url($url);
                                        }
                                    @endphp
                                    <img src="{{ $url }}" alt="....." width="50px">
                                </td>
                                <td class="align-middle text-start">
                                    @php
                                        $prdV = \App\Models\ProductVariant::query()->findOrFail(
                                            $itemOrder->product_variant_id,
                                        );
                                    @endphp
                                    Màu: <span class="badge bg"
                                        style="background-color: {{ $prdV->color['color_value'] }};">{{ $prdV->color['color_value'] }}</span>
                                    <br>
                                    Kích thước: <strong>{{ $prdV->size['size_value'] }}</strong>
                                </td>
                                <td class="align-middle text-center">{{ $itemOrder->product_quantity }}</td>
                                <td class="align-middle text-end">
                                    {{ number_format((int) $itemOrder->product_price_final, 0, ',', '.') }}
                                </td>
                                <td class="align-middle text-end">
                                    {{ number_format((int) $itemOrder->product_price_final * $itemOrder->product_quantity, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row g-0 justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs-10 text-end">
                        @foreach ($data->orderItems as $itemOrder)
                            <tr>
                                <th class="text-900">
                                    {{ $itemOrder->product_name }}:
                                </th>
                                <td class="fw-semi-bold">
                                    {{ number_format((int) $itemOrder->product_price_final, 0, ',', '.') }}
                                    x {{ $itemOrder->product_quantity }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th class="text-900">Mã khuyến mại:</th>
                            <td class="fw-semi-bold">
                                {!! $data->code_coupon != '' ? $data->code_coupon : '...' !!}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-900">Kiểu giảm giá:</th>
                            <td class="fw-semi-bold">
                                {!! $data->discount_type != '' ? $data->discount_type : '...' !!}
                            </td>
                        </tr>
                        <tr>
                            <th class="text-900">Giảm giá:</th>
                            <td class="fw-semi-bold">
                                {!! $data->discount > 0 ? $data->discount : '...' !!}
                            </td>
                        </tr>
                        <tr class="border-top">
                            <th class="text-900">Tổng đơn hàng:</th>
                            <td class="fw-semi-bold">
                                {{ number_format($data->total_price, 0, ',', '.') }} (VNĐ)
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-6">
                    <a class="btn btn-dark" href="{{ route('admin.orders.list') }}">Quay lại</a>
                </div>
                <div class="col-6 text-end">
                    <a class="btn btn-warning" href="{{ route('admin.invoice.save', $data) }}">In hóa đơn</a>
                </div>
            </div>
        </div>
    </div>
@endsection
