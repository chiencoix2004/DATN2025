@extends('admin::layout.master')
@section('title')
    ADMIN | QUẢN LÝ DANH MỤC
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
                            <h5 class="mb-2 mb-md-0">Cập nhật danh mục phụ: {{ $data->name }}</h5>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header bg-body-tertiary">
            <h6 class="mb-0">Danh mục</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update_dm', $data) }}" method="post">
                @csrf
                @method('PUT')
                <table class="table">
                    <thead>
                        <tr>
                            <th>Danh mục cha</th>
                            <th style="width: 300px;">Tên danh mục</th>
                            <th style="width: 600px;">Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="id_category" class="form-control">
                                    <option value="">-- Chọn danh mục</option>
                                    @foreach ($ctg as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $data->name) }}">
                                @error('name')
                                    <hr>
                                    <label class="form-label text-danger">{{ $message }}</label>
                                @enderror
                            </td>
                            <td>
                                <textarea name="note" class="form-control" rows="3">{{ old('note', $data->note) }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                <a href="{{ route('admin.categories.list') }}" class="btn btn-dark">Quay lại</a>
                            </td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
@endsection
