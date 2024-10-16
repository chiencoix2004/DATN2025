<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function listCategories()
    {
        $listCate = Category::all();
        return view('admin::contents.categories.list', compact('listCate'));
    }

    public function create(){
        $listCate=Category::all();
        return view('admin::contents.categories.list',compact('listCate'));
    }
     public function store(Request $request){
        if ($request->hasFile('image_cover')) {
            $imgCate = $request->file('image_cover')->store('uploads/Category', 'public');
        } else {
            $imgCate = null;
        }
        $category = Category::create([
            'name' => $request['name'],
            'note' => $request['note'],
            'slug' => $request['slug'],
            'image_cover' => $imgCate,
            'parent_id' => $request['parent_id'],
        ]);
        return redirect()->route('admin.categories.list');
     }

     public function edit($id)
     {   
         $categories = Category::all();
         $listCate = Category::find($id);
         return view('admin::contents.categories.edit',compact('listCate','categories'));
     }

     public function update(Request $request, $id): RedirectResponse
    {
        $listCate = Category::findOrFail($id);
        if ($request->hasFile('image_cover')) {
            if ($listCate->image_cover){
                Storage::disk('public')->delete($listCate->image_cover);
            }

            $imgCate = $request->file('image_cover')->store('uploads/listCate', 'public');
        } else {
            $imgCate = $listCate->image_cover;
        }

        $listCate->update([
            'name' => $request['name'],
            'note' => $request['note'],
            'slug' => $request['slug'],
            'image_cover' => $imgCate,
            'parent_id' => $request['parent_id'],
        ]);
        return redirect()->route('admin.categories.list');
    }
     public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
        return redirect()->route('admin.categories.list');
    }
}
