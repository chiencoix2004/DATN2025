@extends('admin::layouts.slidebar')
@section('content')
    <div class="table-responsive scrollbar">
        <table class="table table-bordered table-active">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Image</th>
                    <th scope="col">Note</th>
                    <th scope="col">Parent</th>
                    <th class="text-end" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listDanhMuc as $key => $danhMuc)
                    <tr>
                        <td>{{ $danhMuc->name }}</td>
                        <td>{{ $danhMuc->slug }}</td>
                        <td>
                            <img src="{{ Storage::url($danhMuc->image_cover) }}" width="150" height="150" alt="">
                        </td>
                        <td>{{ $danhMuc->note }}</td>
                        <td>{{ $danhMuc->parent_id }}</td>
                        <td class="text-end">
                            <div>
                              <a href="{{route('admin.category.edit', ['id' => $danhMuc->id])}}">
                                <button class="btn btn-link p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                  <span class="text-500 fas fa-edit">   
                                  </span>
                              </button>
                              </a>
                                
                                <form action="{{route('admin.category.destroy', ['id' => $danhMuc->id])}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <button class="btn btn-link p-0 ms-2" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                    <span class="text-500 fas fa-trash-alt">
                                    </span>
                                  </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

