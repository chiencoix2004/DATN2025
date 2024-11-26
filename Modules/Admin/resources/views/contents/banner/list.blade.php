@extends('admin::layout.master')
@section('title')
    ADMIN | QUẢN LÝ BANNER - SLIDER
@endsection

@section('contents')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    @if (session()->has('error'))
                        <h5 class="mb-2 mb-md-0 text-danger">{{ session('error') }}</h5>
                    @else
                        @if (session()->has('success'))
                            <h5 class="mb-2 mb-md-0 text-success">{{ session('success') }}</h5>
                        @else
                            <h5 class="mb-2 mb-md-0">Banner</h5>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <h2 class="text-center mb-4">Chỉnh sửa Banner</h2>
        <div class="row justify-content-center">
            <div class="col-xxl-9">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified mb-4" role="tablist">
                            @foreach ($banner as $idbanner)
                                <li class="nav-item">
                                    <a @if ($idbanner->id == 1) class="nav-link active" @else class="nav-link" @endif
                                        data-bs-toggle="tab" href="#overview{{ $idbanner->id }}" role="tab">
                                        <span>Banner {{ $loop->iteration }}</span>
                                    </a>
                                </li>
                            @endforeach
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#adder" role="tab">
                                    <span>Thêm mới</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tab content -->
                <div class="tab-content">
                    @foreach ($banner as $items)
                        <div @if ($items->id == 1) class="tab-pane active" @else class="tab-pane" @endif
                            id="overview{{ $items->id }}" role="tabpanel">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h4 class="font-size-18 mb-3">Banner {{ $loop->iteration }}</h4>
                                        <form action="{{ route('admin.banner.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <!-- Image Preview -->
                                            <div class="mb-3">
                                                @php
                                                    $url = $items->img_banner;
                                                    if (!\Str::contains($url, 'http')) {
                                                        $url = asset('uploads/' . $url);
                                                    }
                                                @endphp
                                                <img src="{{ $url }}" alt="Banner Image"
                                                    style="width: 100%; height: 300px; object-fit: cover;"
                                                    id="image_preview_container_{{ $items->id }}">
                                                {{-- <img src="{{ asset('uploads/' . $items->img_banner) }}" alt="Banner Image"
                                                    style="width: 100%; height: 300px; object-fit: cover;"
                                                    id="image_preview_container_{{ $items->id }}"> --}}
                                            </div>

                                            <div class="mb-3">
                                                <label for="image_{{ $items->id }}" class="form-label">Ảnh</label>
                                                <input id="image_{{ $items->id }}" name="hinh_anh" type="file"
                                                    class="form-control" accept="image/*"
                                                    onchange="previewImage(event, 'image_preview_container_{{ $items->id }}')">
                                                <input type="hidden" name="id_banner" value="{{ $items->id }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="link_{{ $items->id }}" class="form-label">Liên kết sản
                                                    phẩm</label>
                                                <input id="link_{{ $items->id }}" name="lien_ket" type="text"
                                                    class="form-control" value="{{ $items->link }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="link_{{ $items->id }}" class="form-label">Tiêu đề Giảm
                                                    giá</label>
                                                <input id="link_{{ $items->id }}" name="offer_text" type="text"
                                                    class="form-control" value="{{ $items->offer_text }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="link_{{ $items->id }}" class="form-label">Tiêu đề</label>
                                                <input id="link_{{ $items->id }}" name="title" type="text"
                                                    class="form-control" value="{{ $items->title }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="link_{{ $items->id }}" class="form-label">Mô tả</label>
                                                <input id="link_{{ $items->id }}" name="description" type="text"
                                                    class="form-control" value="{{ $items->description }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner_place_{{ $items->id }}" class="form-label">Vị
                                                    trí</label>
                                                <select class="form-select" name="vi_tri"
                                                    id="banner_place_{{ $items->id }}">
                                                    <option value="1"
                                                        @if ($items->banner_position == 1) selected @endif>Slider</option>
                                                    <option value="2"
                                                        @if ($items->banner_position == 2) selected @endif>Trên</option>
                                                    <option value="3"
                                                        @if ($items->banner_position == 3) selected @endif>Giữa</option>
                                                    <option value="4"
                                                        @if ($items->banner_position == 4) selected @endif>Dưới cùng</option>
                                                </select>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                <a href="{{ route('admin.banner.delete', ['id' => $items->id]) }}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa banner này không?')">Xóa</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Add New Banner Tab -->
                    <div class="tab-pane" id="adder" role="tabpanel">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h4 class="font-size-18 mb-3">Thêm Banner</h4>
                                    <form action="{{ route('admin.banner.add') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')

                                        <!-- Image Upload -->
                                        <div class="mb-3">
                                            <label for="new_banner_image" class="form-label">Ảnh</label>
                                            <input id="new_banner_image" name="hinh_anh" type="file"
                                                class="form-control" accept="image/*"
                                                onchange="previewImage(event, 'new_image_preview')">
                                            <div id="new_image_preview" class="mt-3"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="new_banner_link" class="form-label">Liên kết sản phẩm</label>
                                            <input id="new_banner_link" name="lien_ket" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_offer_text" class="form-label">Tiêu đề Giảm giá</label>
                                            <input id="link_{{ $items->id }}" name="offer_text" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_title" class="form-label">Tiêu đề</label>
                                            <input id="link_{{ $items->id }}" name="title" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="new_description" class="form-label">Mô tả</label>
                                            <input id="link_{{ $items->id }}" name="description" type="text"
                                                class="form-control">
                                        </div>


                                        <div class="mb-3">
                                            <label for="new_banner_position" class="form-label">Vị trí</label>
                                            <select class="form-select" name="vi_tri" id="new_banner_position">
                                                <option value="1">Slider</option>
                                                <option value="2">Trên</option>
                                                <option value="3">Giữa</option>
                                                <option value="4">Dưới cùng</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Thêm Banner</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js-libs')
    <script src="{{ asset('theme/admin/js/jquery.min.js') }}"></script>
@endsection
@section('js-setting')
    <!-- JS for Image Preview -->
    <script>
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewContainer.innerHTML =
                        `<img src="${e.target.result}" class="img-fluid" style="max-height: 300px; object-fit: cover;">`;
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = '';
            }
        }
    </script>
@endsection
