<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hóa Đơn #{{ $data->id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
        }

        .invoice-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 5px solid rgb(33, 33, 134);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            font-size: 24px;
            margin: 0;
        }

        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-items table th,
        .order-items table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        .order-items table th {
            background-color: #f9f9f9;
        }

        .order-items table tr.tfoot th,
        .order-items table tr.tfoot td {
            background-color: #f9f9f9;
            line-height: 7px;
            border: none;
        }

        .invoice-footer {
            display: flex;
            justify-content: right;
            width: 100%;
            background-color: #f9f9f9;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Đơn hàng: #{{ $data->id }}</h1>
        </div>
        <div class="order-items">
            <table>
                <tr>
                    <td colspan="4">
                        <strong>Người nhận:</strong> {{ $data->ship_user_name }}<br>
                        <strong>Email:</strong> {{ $data->ship_user_email }}<br>
                        <strong>Điện thoại:</strong> {{ $data->ship_user_phone }}<br>
                        <strong>Nơi nhận:</strong> {{ $data->ship_user_address }}
                    </td>
                    <td colspan="2">
                        <strong>Phương thức thanh toán:</strong><br>{{ $data->payment_method }}<br>
                        <strong>Ngày Tạo:</strong> {{ $data->date_create_order }}<br>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align: left;">
                        @php
                            $formatter = new NumberFormatter('vi_VN', NumberFormatter::SPELLOUT);
                            $soTienBangChu = $formatter->format($data->total_price);
                            $soTienBangChu = ucfirst($soTienBangChu);
                        @endphp
                        <a style="background-color: rgb(30, 166, 30); color: white; border-radius: 5px; padding: 5px;">
                            <strong>Tổng đơn hàng:</strong> {{ number_format($data->total_price, 0, ',', '.') }} (VNĐ)
                        </a>
                        <div style="margin-top: 5px;">
                            <strong>Số tiền viết bằng chữ:</strong> <i>{{ $soTienBangChu }}</i>.
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá (VND)</th>
                    <th style="width: 150px;">Tổng</th>
                </tr>
                @php
                    $stt = 1;
                @endphp
                @foreach ($data->orderItems as $itemOrder)
                    <tr>
                        <td>{{ $stt }}</td>
                        <td>{{ $itemOrder->product_name }}<br><small>{{ $itemOrder->product_sku }}</small></td>
                        <td>
                            {{-- <img src="{{ \Storage::url('product/small-size/1.jpg') }}" width="70px"> --}} {{-- link path storage --}}
                            <img src="{{ $itemOrder->product_avatar }}" width="70px"> {{-- link htttps --}}
                        </td>
                        <td>{{ $itemOrder->product_quantity }}</td>
                        <td>
                            {{ number_format((int) $itemOrder->product_price_final, 0, ',', '.') }}
                        </td>
                        <td>
                            {{ number_format((int) $itemOrder->product_price_final * $itemOrder->product_quantity, 0, ',', '.') }}
                        </td>
                    </tr>
                    @php
                        $stt++;
                    @endphp
                @endforeach
                @foreach ($data->orderItems as $itemOrder)
                    <tr class="tfoot">
                        <th colspan="5" style="text-align: right;">{{ $itemOrder->product_name }}:</th>
                        <td style="text-align: right;">
                            {{ number_format((int) $itemOrder->product_price_final, 0, ',', '.') }}
                            x {{ $itemOrder->product_quantity }}
                        </td>
                    </tr>
                @endforeach
                <tr class="tfoot">
                    <th colspan="5" style="text-align: right;">Mã khuyến mại:</th>
                    <td style="text-align: right;">
                        {{ $data->code_coupon != '' ? $data->code_coupon : '...' }}
                    </td>
                </tr>
                <tr class="tfoot">
                    <th colspan="5" style="text-align: right;">Kiểu giảm giá:</th>
                    <td style="text-align: right;">{{ $data->discount_type }}</td>
                </tr>
                <tr class="tfoot">
                    <th colspan="5" style="text-align: right;">Giảm giá:</th>
                    <td style="text-align: right;">
                        @if ($data->discount > 0)
                            {{ $data->discount_type == 'Cố định' ? number_format($data->discount, 0, ',', '.') : $data->discount . '(%)' }}
                        @else
                            ...
                        @endif
                    </td>
                </tr class="tfoot">
                <tr class="tfoot">
                    <th colspan="5" style="text-align: right; border-top: 1px solid black;">Tổng đơn hàng:</th>
                    <th style="text-align: right; border-top: 1px solid black;">
                        {{ number_format($data->total_price, 0, ',', '.') }} (VNĐ)
                    </th>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
