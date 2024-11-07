@extends('admin::layout.master')
@section('title')
    Admin | DANH SÁCH DANH MỤC
@endsection
@section('contents')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Danh sách danh mục</h5>
                </div>
            </div>
            <hr>
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    {{-- Form Add Cate --}}
                    <form class="row gy-2 gx-3 align-items-center" action="{{ route('admin.categories.store') }}"
                        method="POST" id="categoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-auto">
                            <label class="form-label" for="name">Tên</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                                name="name" value="{{ old('name') }}" />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="autoSizingSelect">Mục</label>
                            <select class="form-select @error('parent_id') is-invalid @enderror" id="autoSizingSelect" name="parent_id" >
                                <option selected>Trống</option>         
                                @foreach ($listCate as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('parent_id', $item['parent_id']) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                                <option value="">Mục mới</option>
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="slug">Slug</label>
                            <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text"
                                name="slug" value="{{ old('slug') }}" />
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="card-body">
                            <div class="dropzone dropzone-multiple p-0" id="dropzoneMultipleFileUpload"
                                data-dropzone="data-dropzone">
                                <div class="dz-message @error('image_cover') is-invalid @enderror"
                                    data-dz-message="data-dz-message">
                                    <img class="me-2" src="{{ asset('theme/admin/img/icons/cloud-upload.svg') }}"
                                        width="25" alt="" />
                                    <span class="d-none d-lg-inline">Drag your image here<br />or, </span>
                                    <span class="btn btn-link p-0 fs-10">Browse</span>
                                </div>
                                @error('image_cover')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                                    <div class="d-flex media align-items-center mb-3 pb-3 border-bottom btn-reveal-trigger">
                                        <img class="dz-image" src="{{ asset('theme/admin/img/icons/cloud-upload.svg') }}"
                                            alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                                        <div class="flex-1 d-flex flex-between-center">
                                            <div>
                                                <h6 data-dz-name="data-dz-name"></h6>
                                                <div class="d-flex align-items-center">
                                                    <p class="mb-0 fs-10 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                                    <div class="dz-progress">
                                                        <span class="dz-upload" data-dz-uploadprogress=""></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown font-sans-serif">
                                                <button
                                                    class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none"
                                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="fas fa-ellipsis-h"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end border py-2">
                                                    <a class="dropdown-item" href="#!"
                                                        data-dz-remove="data-dz-remove">Remove
                                                        File</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="image_cover" id="hidden-files" style="display: none;">
                        </div>
                </div>

                <div class="col-auto">
                    <label class="form-label" for="basic-form-textarea">Ghi chú</label>
                    <textarea class="form-control @error('note') is-invalid @enderror" id="basic-form-textarea" rows="2"
                        cols="50" name="note"></textarea>
                    @error('note')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div class="col-auto">
                    <button class="btn btn-primary" id="submit-button" type="submit">Thêm mới</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="card-body px-0">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-023429b2-f0b9-4091-bf3c-0936e4daf000"
                id="dom-023429b2-f0b9-4091-bf3c-0936e4daf000">
                <table class="table mb-0 data-table fs-10" data-datatables="data-datatables">
                    <thead class="bg-200">
                        <tr>
                            <th class="text-900 sort">Tên</th>
                            <th class="text-900 sort">Slug</th>
                            <th class="text-900 sort">Ghi chú</th>
                            <th class="text-900 sort">Ảnh</th>
                            <th class="text-900 sort text-end">Mục</th>
                            <th class="text-900 no-sort pe-1 align-middle data-table-row-action"></th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-simple-pagination-body">
                        @foreach ($listCate as $item)
                            <tr class="btn-reveal-trigger">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <strong>{{ $item->note }}</strong>
                                </td>
                                <td>
                                    @if ($item->image_cover)
                                    @php
                                        $url = $item->image_cover;
                                        if (!\Str::contains($url, 'http')) {
                                            $url = \Storage::url($url);
                                        }
                                    @endphp
                                        <img src="{{ $url }}" width="100" height="100"
                                            alt="">
                                    @endif
                                </td>
                                <td class="text-end">
                                    <strong>{{ $item->parent_id }}</strong>
                                </td>
                                <td class="align-middle white-space-nowrap text-end">
                                    <div class="dropstart font-sans-serif position-static d-inline-block">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                            type="button" id="dropdown-simple-pagination-table-item-0"
                                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                            aria-expanded="false" data-bs-reference="parent">
                                            <span class="fas fa-ellipsis-h fs-10"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-2"
                                            aria-labelledby="dropdown-simple-pagination-table-item-0">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.categories.edit', ['id' => $item->id]) }}">Sửa</a>
                                            <div class="dropdown-divider"></div>

                                            <form action="{{ route('admin.categories.destroy', ['id' => $item->id]) }}"
                                                method="POST" onclick="return confirm('Có chắc chắn muốn xóa không!')">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item" type="submit" data-bs-placement="top"
                                                    title="Delete">
                                                    Xóa
                                                </button>
                                            </form>
                                            {{-- <a class="dropdown-item text-danger" href=""
                                                onclick="return confirm('Có chắc chắn muốn xóa không!')">Delete</a> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script>
        //Slug name
        function createSlug(value) {
            return value
                .toLowerCase()
                .replace(/đ/g, 'd')
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9\s-]/g, '')
                .trim()
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }
        document.getElementById('name').addEventListener('input', function() {
            const nameInput = this.value;
            const slug = createSlug(nameInput);
            document.getElementById('slug').value = slug;
        });

    </script>
@endsection
@section('css-libs')
    <link rel="stylesheet" href="{{ asset('theme/admin/vendors/dropzone/dropzone.css') }}">
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}"></script>
    <script src="{{ asset('theme/admin/vendors/dropzone/dropzone-min.js') }}"></script>
@endsection
@section('js-setting')
    <script>
        // xử lý upload file bằng thư biên dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#dropzoneMultipleFileUpload", {
            url: "#", // Không cần URL vì sẽ submit form thông thường
            autoProcessQueue: false, // Không tự động upload
            // paramName: "product_galleries", // Tên của input trong request
            uploadMultiple: true, // Cho phép chọn nhiều file
            parallelUploads: 10, // Giới hạn số file upload đồng thời
            maxFilesize: 5, // Kích thước file tối đa
            acceptedFiles: "image/*", // Chỉ nhận file ảnh
            previewsContainer: document.querySelector(".dz-preview"),
            previewTemplate: document.querySelector(".dz-preview").innerHTML,
            clickable: true, // Cho phép người dùng click vào vùng Dropzone để chọn file
            // dictDefaultMessage: 'Drag your image here or, Browse',
            init: function() {
                var myDropzone = this;
                document.querySelector(".dz-preview").innerHTML = "";
                // Khi nhấn nút submit
                document.getElementById("submit-button").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    // Nếu có file trong Dropzone
                    if (myDropzone.getAcceptedFiles().length > 0) {
                        var hiddenFilesInput = document.getElementById('hidden-files');
                        var dataTransfer =
                            new DataTransfer(); // Sử dụng DataTransfer để chứa nhiều file
                        // Thêm từng file từ Dropzone vào DataTransfer
                        myDropzone.getAcceptedFiles().forEach(function(file) {
                            dataTransfer.items.add(file);
                        });
                        // Gán danh sách file vào input file ẩn
                        hiddenFilesInput.files = dataTransfer.files;
                        // Sau đó submit form bình thường
                        document.getElementById("categoryForm").submit();
                    } else {
                        // Nếu không có file trong Dropzone, submit form ngay lập tức
                        document.getElementById("categoryForm").submit();
                    }
                });
            }
        });
    </script>
@endsection
