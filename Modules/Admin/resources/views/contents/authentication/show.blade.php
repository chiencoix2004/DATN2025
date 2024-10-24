@extends('admin::layout.master')

@section('title')
    Khách hàng : {{ $user->full_name }}
@endsection
@section('css-libs')
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}"> --}}
    <script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dataTables/datatables.css') }}">
    <script src="{{ asset('dataTables/datatables.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('css-setting')
@endsection
@section('contents')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5 class="mb-2">{{ $user->full_name }} (<a href="mailto:tony@gmail.com">{{ $user->email }}</a>)</h5><a
                        class="btn btn-falcon-default btn-sm" href="#!"><span class="fas fa-plus fs-11 me-1"></span>Add
                        note</a><button class="btn btn-falcon-default btn-sm dropdown-toggle ms-2 dropdown-caret-none"
                        type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                            class="fas fa-ellipsis-h"></span></button>
                    <div class="dropdown-menu"><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item"
                            href="#">Report</a><a class="dropdown-item" href="#">Archive</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#">Delete
                            user</a>
                    </div>
                </div>
                <div class="col-auto d-none d-sm-block">
                    <h6 class="text-uppercase text-600">{{ $user->role_type }}<span class="fas fa-user ms-2"></span></h6>
                </div>
            </div>
        </div>
        <div class="card-body border-top">
            <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
                <div class="flex-1">
                    <p class="mb-0">Khách hàng đã được tạo</p>
                    <p class="fs-10 mb-0 text-600">{{ $user->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Chi tiết tài khoản</h5>
                </div>
                <div class="col-auto">
                    {{-- <a class="btn btn-falcon-default btn-sm" href="#!"><span
                            class="fas fa-pencil-alt fs-11 me-1"></span>Update details</a> --}}
                        </div>
            </div>
        </div>
        <div class="card-body bg-body-tertiary border-top">
            <div class="row">
                <div class="col-lg col-xxl-5">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">THÔNG TIN TÀI KHOẢN</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">ID</p>
                        </div>
                        <div class="col">{{ $user->id }}</div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Ngày tạo</p>
                        </div>
                        <div class="col">{{ $user->created_at }}</div>
                    </div> --}}
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">UserName</p>
                        </div>
                        <div class="col">{{ $user->user_name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">PhoneNumber</p>
                        </div>
                        <div class="col">{{ $user->phone }}</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Email</p>
                        </div>
                        <div class="col"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Description</p>
                        </div>
                        <div class="col">
                            <p class="fst-italic text-400 mb-1">No Description</p>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-0">VAT number</p>
                        </div>
                        <div class="col">
                            <p class="fst-italic text-400 mb-0">No VAT number</p>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase"></h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">FullName</p>
                        </div>
                        <div class="col">{{ $user->full_name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Address</p>
                        </div>
                        <div class="col">{{ $user->address }}</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Vai Trò</p>
                        </div>
                        <div class="col">
                            @if ($user->roles_id == 1)
                                <p>Admin</p>
                            @elseif($user->roles_id == 2)
                                <p>Nhân viên</p>
                            @elseif($user->roles_id == 3)
                                <p>Khách hàng</p>
                            @else
                                <p>Không xác định</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-0">Trạng Thái </p>
                        </div>
                        <div class="col">
                            <p class="fw-semi-bold mb-0">{{ $user->status }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="card-footer border-top text-end">
           {{-- <a class="btn btn-falcon-default btn-sm" href="#!"><span
                    class="fas fa-dollar-sign fs-11 me-1"></span>Refund</a><a class="btn btn-falcon-default btn-sm ms-2"
                href="#!"><span class="fas fa-check fs-11 me-1"></span>Save changes</a></div> --}}
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Logs</h5>
        </div>
        <div class="card-body border-top p-0">
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-subtle-success rounded-pill">200</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoiceitems</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/23 15:29:45</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-subtle-warning rounded-pill">400</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoiceitems</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/19 21:32:12</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-subtle-success rounded-pill">200</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/26 12:23:43</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-subtle-success rounded-pill">200</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/12 23:32:12</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-subtle-danger rounded-pill">404</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/08 02:20:23</p>
                </div>
            </div>
            <div class="row g-0 align-items-center border-bottom py-2 px-3">
                <div class="col-md-auto pe-3"><span class="badge badge-subtle-success rounded-pill">200</span></div>
                <div class="col-md mt-1 mt-md-0"><code>POST /v1/invoices/in_1Dnkhadfk</code></div>
                <div class="col-md-auto">
                    <p class="mb-0">2019/02/01 12:29:34</p>
                </div>
            </div>
        </div>
        <div class="card-footer bg-body-tertiary p-0"><a class="btn btn-link d-block w-100" href="#!">View more
                logs<span class="fas fa-chevron-right fs-11 ms-1"></span></a></div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Thành Công",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "thất bại",
                text: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            Swal.fire({
                title: "{{ session('info') }}",
                text: "{{ session('info') }}",
                icon: "info"
            });
        </script>
    @endif
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/vendors/jquery/jquery.min.js') }}"></script>
@endsection
