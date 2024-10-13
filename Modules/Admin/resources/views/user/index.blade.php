@extends('admin::layout.master')

@section('title')
    Danh sách khách hàng 
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
    <div class="card mb-3" id="customersTable"
        data-list='{"valueNames":["name","email","phone","address","joined"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Danh sách khách hàng</h5>
                </div>
                <div class="col-8 col-sm-auto text-end ps-2">
                    <div class="d-none" id="table-customers-actions">
                        <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                                <option selected="">Bulk actions</option>
                                <option value="Refund">Refund</option>
                                <option value="Delete">Delete</option>
                                <option value="Archive">Archive</option>
                            </select><button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button></div>
                    </div>
                    <div id="table-customers-replace-element"><button class="btn btn-falcon-default btn-sm"
                            type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">New</span></button><button
                            class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">Filter</span></button><button
                            class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt"
                                data-fa-transform="shrink-3 down-2"></span><span
                                class="d-none d-sm-inline-block ms-1">Export</span></button></div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs-10 mb-0 overflow-hidden">
                    <thead class="bg-200">
                        <tr>
                            <th>
                                <div class="form-check fs-9 mb-0 d-flex align-items-center">
                                    {{-- <input class="form-check-input"
                                        id="checkbox-bulk-customers-select" type="checkbox"
                                        data-bulk-select='{"body":"table-customers-body","actions":"table-customers-actions","replacedElement":"table-customers-replace-element"}' /> --}}
                                </div>
                            </th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="name">Tên khách hàng
                            </th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="email">Email</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="phone">Số điện thoại
                            </th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap ps-5" data-sort="address"
                                style="min-width: 200px;">Địa chỉ</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="joined">Ngày đăng ký
                            </th>
                            <th class="align-middle no-sort"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                        @foreach ($users as $user)
                            <tr class="btn-reveal-trigger">
                                <td class="align-middle py-2" style="width: 28px;">
                                    {{-- <div class="form-check fs-9 mb-0 d-flex align-items-center"><input class="form-check-input"
                                        type="checkbox" id="customer-0" data-bulk-select-row="data-bulk-select-row" /></div> --}}
                                </td>
                                <td class="name align-middle white-space-nowrap py-2"><a
                                        href="{{ route('admin.users.show', ['id' => $user->id]) }}">
                                        <div class="d-flex d-flex align-items-center">
                                            <div class="avatar avatar-xl me-2">
                                                <div class="avatar-name rounded-circle"><img
                                                        src=" 	{{ Storage::url($user->user_image) }}" class="rounded-4"
                                                        alt=""></div>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="mb-0 fs-10">{{ $user->full_name }}</h5>
                                            </div>
                                        </div>
                                    </a></td>
                                <td class="email align-middle py-2"><a
                                        href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>
                                <td class="phone align-middle white-space-nowrap py-2"><a
                                        href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
                                <td class="address align-middle white-space-nowrap ps-5 py-2">{{ $user->address }}</td>
                                <td class="joined align-middle py-2">{{ optional($user->created_at)->format('d/m/Y') }}
                                </td>
                                <td class="align-middle white-space-nowrap py-2 text-end">
                                    <div class="dropdown font-sans-serif position-static"><button
                                            class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button"
                                            id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs-10"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="customer-dropdown-0">
                                            <div class="py-2"><a class="dropdown-item" href="#!">Edit</a><a
                                                    class="dropdown-item text-danger" href="#!">Delete</a></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach




                    </tbody>
                </table>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <div class="mt-4">

            </div>
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
