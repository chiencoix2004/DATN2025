@extends('wallet::layouts.master')

@section('content')
<script src="{{ Module::asset('wallet:libs/gridjs/gridjs.umd.js') }}"></script>
    <div class="">

        <div class="row">
            <div class="col-lg-6">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary">
                        <h5 class="my-0 text-primary"><i class="fas fa-money-check"></i> Số dư hiện có</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Số dư tài khoản</h5>
                        <p class="card-text">1.000.000 VND</p>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-6">
                <div class="card border border-warning">
                    <div class="card-header bg-transparent border-warningr">
                        <h5 class="my-0 text-warning"><i class="bx bxs-timer"></i> Số dư rút tiền chờ duyệt</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Số tiền chờ duyệt</h5>
                        <p class="card-text">213.000 VND</p>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>

    <div class="">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Search</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div id="table-search"></div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>

    <script>
new gridjs.Grid({
    columns: ["Mã giao dịch", "Số tiền", "Loại giao dịch", "Ngày tạo", {
        name: "Trạng thái",
        formatter: (cell) => {
            // Define badge color based on status
            let badgeClass = cell === "Thành công" ? "badge bg-success" : "badge bg-danger";
            return gridjs.html(`<span class="badge ${badgeClass}">${cell}</span>`);
        }
    },
    {
        name: "Hành động",
        formatter: (cell) => gridjs.html(`<button class="btn btn-primary btn-sm">${cell}</button>`)
    }],
    pagination: { limit: 5 },
    search: true,
    data: [
        ["1", "100000", "Nạp tiền", "2021-09-01", "Thành công","Xem"],
        ["2", "200000", "Rút tiền", "2021-09-02", "Thất bại","Xem"],
        ["3", "300000", "Nạp tiền", "2021-09-03", "Thành công","Xem"],
        ["4", "400000", "Rút tiền", "2021-09-04", "Thất bại","Xem"],
        ["5", "500000", "Nạp tiền", "2021-09-05", "Thành công","Xem"],
        ["6", "600000", "Rút tiền", "2021-09-06", "Thành công","Xem"],
        ["7", "700000", "Nạp tiền", "2021-09-07", "Thất bại","Xem"],
        ["8", "800000", "Rút tiền", "2021-09-08", "Thành công","Xem"],
        ["9", "900000", "Nạp tiền", "2021-09-09", "Thành công","Xem"],
        ["10", "1000000", "Rút tiền", "2021-09-10", "Thất bại","Xem"]
    ]
}).render(document.getElementById("table-search"));

    </script>
@endsection
