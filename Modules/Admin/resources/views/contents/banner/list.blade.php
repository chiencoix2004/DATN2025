@extends('admin::layout.master')
@section('title')
    Admin | Banner manager
    <?php
    $count = 0;
    $counttitle = 0;
    ?>
@endsection
@section('contents')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="container">
        <h2 class="mt-4">Chỉnh sửa Banner</h2>
        <div class="row">
            <div class="col-xxl-9">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            @foreach ($banner as $idbanner)
                                <li class="nav-item">
                                    <a @if ($idbanner->id == 1) class="nav-link active" @else class="nav-link" @endif
                                        data-bs-toggle="tab" href="#overview{{ $idbanner->id }}" role="tab">
                                        <span>Banner {{ $count+=1 }}</span>
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
                <div class="tab-content mt-4">
                    @foreach ($banner as $items)
                        <div @if ($items->id == 1) class="tab-pane active" @else class="tab-pane" @endif
                            id="overview{{ $items->id }}" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="py-2">
                                        <div class="mx-n4 px-4" data-simplebar style="max-height: 500px;">
                                            <div id="banner{{ $items->id }}-productinfo-collapse" class="collapse show"
                                                data-bs-parent="#banner{{ $items->id }}-accordion">
                                                <div class="p-4 border-top">
                                                     <h4 class="font-size-16 mb-3 mt-3">Banner {{   $counttitle+=1 }}</h4>
                                                    <form action="{{ route('admin.banner.update') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <img src="{{ asset("uploads/$items->img_banner") }}" alt=""
                                                            style="width: 100%; height: 300px;"
                                                            id="image_preview_container">
                                                        <div class="mb-3">
                                                            <label for="projectname" class="form-label">Ảnh</label>
                                                            <input id="projectname" name="hinh_anh" type="file"
                                                                class="form-control" accept="image/*"
                                                                value="{{ $items->img_banner }}">

                                                            <input type="hidden" name="id_banner"
                                                                value="{{ $items->id }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="projectname" class="form-label">Liên kết sản
                                                                phẩm</label>
                                                            <input id="projectname" name="lien_ket" type="text"
                                                                class="form-control" value="{{ $items->link }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="banner_place" class="form-label">Vị trí</label>
                                                            <select class="form-select" name="vi_tri" id="banner_place">
                                                                <option value="1"
                                                                    @if ($items->banner_position == 1) selected @endif>Trên
                                                                    cùng</option>
                                                                <option value="2"
                                                                    @if ($items->banner_position == 2) selected @endif>Giữa
                                                                </option>
                                                                <option value="3"
                                                                    @if ($items->banner_position == 3) selected @endif>Dưới
                                                                    cùng</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                        <a href="{{ route('admin.banner.delete', ['id' => $items->id]) }}"
                                                            class="btn btn-danger" onclick="return confrim()">Xóa</a>

                                                    </form>


                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="tab-pane" id="adder" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="py-2">
                                    <div class="mx-n4 px-4" data-simplebar style="max-height: 500px;">
                                        <div id="banner-productinfo-collapse" class="collapse show"
                                            data-bs-parent="#banner-accordion">
                                            <div class="p-4 border-top">
                                                <h4 class="font-size-16 mb-3 mt-3">Thêm Banner</h4>
                                                <form action="{{ route('admin.banner.add') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('POST')

                                                    <div class="mb-3">
                                                        <label for="adder" class="form-label">Ảnh</label>
                                                        <input id="adder" name="hinh_anh" type="file" class="form-control" accept="image/*" onchange="previewImagesindex(event)">
                                                        <div id="image-preview-container" class="mt-2"></div>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="projectname" class="form-label">Liên kết sản
                                                            phẩm</label>
                                                        <input id="projectname" name="lien_ket" type="text"
                                                            class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="banner_place" class="form-label">Vị trí</label>
                                                        <select class="form-select" name="vi_tri" id="banner_place">
                                                            <option value="1"selected>Trên cùng</option>
                                                            <option value="2" selected>Giữa</option>
                                                            <option value="3" selected>Dưới cùng</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Thêm banner</button>
                                                </form>

                                            </div>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->
        <!-- container-fluid -->
    </div>
    <script>
        $(document).ready(function(e) {
            // For Chỉnh sửa Banner section
            $('#projectname').change(function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#image_preview_container').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // For Thêm Banner section

        });
        function previewImagesindex(event) {
                var previewContainer = document.getElementById('image-preview-container');
                previewContainer.innerHTML = ''; // Xóa các xem trước cũ

                var files = event.target.files;

                for (var i = 0; i < Math.min(files.length, 1); i++) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('mx-auto', 'my-2', 'max-w-100', 'max-h-100');
                        previewContainer.appendChild(img);
                    };

                    reader.readAsDataURL(files[i]);
                }
            }
        function confrim(){
            return confirm('Bạn có chắc chắn muốn xóa banner này không?');
        }
    </script>


@endsection
