@extends('admin::layout.master')
@section('title')
    Admin | List Categories
@endsection
@section('contents')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Sửa Danh Mục</h5>
                </div>
            </div>
            <hr>
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    {{-- Form Add Cate --}}
                    <form class="row gy-2 gx-3 align-items-center"
                        action="{{ route('admin.categories.update', ['id' => $listCate->id]) }}" method="POST"
                        id="categoryForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-auto">
                            <label class="form-label" for="name">Tên</label>
                            <input class="form-control" id="name" type="text" name="name"
                                @error('name') is-invalid @enderror value="{{ old('name', $listCate['name']) }}" />
                            @error('name')
                                <br>
                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="parent_id">Mục</label>
                            <select class="form-select" id="parent_id" name="parent_id">
                                <option value="" selected>Trống</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('parent_id', $item['parent_id']) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="slug">Slug</label>
                            <input class="form-control" id="slug" type="text" name="slug"
                                @error('slug') is-invalid @enderror value="{{ old('slug', $listCate['slug']) }}" />
                            @error('slug')
                                <br>
                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <label class="form-label" for="note">Ghi chú</label>
                            <textarea class="form-control" id="note" rows="2" cols="50" name="note">{{ old('note', $listCate['note']) }}</textarea>

                        </div>


                        <div class="col-auto">
                            <label class="form-label" for="image_cover">Ảnh</label>
                            <input width="25" type="file" class="form-control"
                                @error('image_cover') is-invalid @enderror name="image_cover">
                            @error('image_cover')
                                <br>
                                <div class="alert alert-danger col-md-9">{{ $message }}</div>
                            @enderror
                            <img src="{{ Storage::url($item->image_cover) }}" width="100" height="100" alt="">
                        </div>
                        <hr>

                        <div class="col-auto">
                            <button class="btn btn-secondary" type="submit">Quay lại</button>
                            <button class="btn btn-primary" type="submit">Cập nhật</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
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
@section('js-libs')
    <script src="{{ asset('theme/admin/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}"></script>
@endsection
