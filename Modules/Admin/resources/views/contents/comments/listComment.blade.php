@extends('admin::layout.master')
@section('title')
    Admin | List Comment
@endsection
@section('contents')
    <div class="card mb-3">
        <div class="card-body px-0">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                    aria-labelledby="tab-dom-023429b2-f0b9-4091-bf3c-0936e4daf000"
                    id="dom-023429b2-f0b9-4091-bf3c-0936e4daf000">
                    <table class="table mb-0 data-table fs-10" data-datatables="data-datatables">
                        <thead class="bg-200">
                            <tr>
                                <th class="text-900 sort">STT</th>
                                <th class="text-900 sort">Tên Người Dùng</th>
                                <th class="text-900 sort">Tên Sản Phẩm</th>
                                <th class="text-900 sort">Comment</th>
                                <th class="text-900 sort">Rate</th>
                                <th class="text-900 sort">Comment Date</th>
                                <th class="text-900 sort">Loại</th>
                                {{-- <th class="text-900 no-sort pe-1 align-middle data-table-row-action">Action</th> --}}
                                <th class="text-900 no-sort">Action</th>
                            </tr>
                        </thead>

                        <tbody class="list" id="table-simple-pagination-body">
                            @foreach ($listComment as $item)
                                <tr class="btn-reveal-trigger">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->comments }}</td>
                                    <td>{{ $item->rating }}<span class="fas fa-star"></span></td>
                                    {{-- <td>{{ $item->comment_date }}</td> --}}
                                    <td>
                                        {{ $item->comment_date }}
                                        @if ($item->isNewComment)
                                            <span style="color: red;">
                                                <b class="blink">New <span class="fas fa-fire fire-animation"></span></b>
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        @switch($item->status)
                                            @case(1)
                                                <span style="color: orange;"><b>Đang duyệt</b></span>
                                            @break

                                            @case(2)
                                                <span style="color: green;"><b>Đã duyệt</b></span>
                                            @break

                                            @case(3)
                                                <span style="color: gray;"><b>Đã ẩn</b></span>
                                            @break

                                            @default
                                                <span style="color: red;"><b>Không xác định</b></span>
                                        @endswitch
                                    </td>
                                    <td class="align-middle white-space-nowrap text-end">
                                        <a class="btn btn-primary" role="button"
                                            href="{{ route('admin.comment.editComment', ['id' => $item->id]) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        .blink {
            animation: blink-animation 1s steps(5, start) infinite;
            /* Nhấp nháy */
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
                /* Ẩn văn bản */
            }
        }

        .fire-animation {
            color: red;
            animation: fireFlicker 1.5s infinite alternate, colorChange 3s infinite;
        }

        @keyframes fireFlicker {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes colorChange {
            0% {
                color: red;
            }

            50% {
                color: orange;
            }

            100% {
                color: yellow;
            }
        }

        .fire-animated {
            color: orange;
            animation: flicker 1s infinite alternate;
        }

        @keyframes flicker {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }

            100% {
                opacity: 1;
            }
        }
    </style>
@endsection
{{-- @section('js-libs')
    <script src="{{ asset('theme/admin/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}"></script>
@endsection --}}
