<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDanhMuc = CategoryModel::all();
        return view('admin::category.index',compact('listDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listDanhMuc = CategoryModel::all();
        return view('admin::category.add',compact('listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {   

        //dd($request);
        // $validateData = $request->validate([
        //     'name' => 'required',
        //     'note' => 'required',
        //     'slug' => 'required',
        //     'image_cover' => 'required|mimes:jpeg,png,jpg,gif',
        //     'parent_id' => 'required',
        // ]);
        
        if ($request->hasFile('image_cover')) {
            $imgCate = $request->file('image_cover')->store('uploads/danhMuc', 'public');
        } else {
            $imgCate = null;
        }

        // dd($validateData);
        

        $danhMuc = CategoryModel::create([
            'name' => $request['name'],
            'note' => $request['note'],
            'slug' => $request['slug'],
            'image_cover' => $imgCate,
            'parent_id' => $request['parent_id'],
        ]);
        return redirect()->route('admin.category.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $categories = CategoryModel::all();
        $danhMuc = CategoryModel::find($id);
        return view('admin::category.update',compact('danhMuc','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $danhMuc = CategoryModel::findOrFail($id);
        if ($request->hasFile('image_cover')) {
            if ($danhMuc->image_cover){
                Storage::disk('public')->delete($danhMuc->image_cover);
            }

            $imgCate = $request->file('image_cover')->store('uploads/danhMuc', 'public');
        } else {
            $imgCate = $danhMuc->image_cover;
        }

        $danhMuc->update([
            'name' => $request['name'],
            'note' => $request['note'],
            'slug' => $request['slug'],
            'image_cover' => $imgCate,
            'parent_id' => $request['parent_id'],
        ]);
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $danhMuc = CategoryModel::findOrFail($id);

        $danhMuc->delete();
        return redirect()->route('admin.category.index');
    }
}
