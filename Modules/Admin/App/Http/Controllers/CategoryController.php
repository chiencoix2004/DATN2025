<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
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

    public function create()
    {
        $listCate = Category::all();
        return view('admin::contents.categories.list', compact('listCate'));
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate(
            [
                'name' => 'required|string|min:3|max:255',
                'parent_id' => 'nullable|exists:categories,id',
                'new_category' => 'nullable|string|max:255',
                'slug' => [
                    'required','string','min:3','max:255','regex:/^[a-z0-9-]+$/',
                    Rule::unique('categories', 'slug'),],
                'image_cover' => ['required', 'file', 'image',],
                'note' => ['nullable', 'string','regex:/^[\p{L}\p{N}\s]+$/u', 'max:500',],
            ],
            [
                'name.required' => 'Trường tên là bắt buộc.',
                'name.min' => 'Tên phải có ít nhất 3 ký tự.',
                'name.max' => 'Tên không được vượt quá 255 ký tự.',
                'parent_id.integer' => 'Mục phải được chọn.',
                'parent_id.exists' => 'Mục đã chọn không hợp lệ.',
                'slug.required' => 'Slug là bắt buộc.',
                'slug.min' => 'Slug phải có ít nhất 3 ký tự.',
                'slug.max' => 'Slug không được vượt quá 255 ký tự.',
                'slug.regex' => 'Slug chỉ được chứa chữ thường, số và dấu gạch ngang.',
                'slug.unique' => 'Slug này đã tồn tại, vui lòng chọn slug khác.',
                'image_cover.required' => 'Vui lòng chọn một file hình ảnh.',
                'image_cover.file' => 'File tải lên phải là một file hợp lệ.',
                'image_cover.image' => 'File phải là hình ảnh.',
                'note.string' => 'Ghi chú phải là chuỗi ký tự hợp lệ.',
                'note.regex' => 'Ghi chú không được chứa ký tự đặc biệt.',
                'note.max' => 'Ghi chú không được vượt quá 500 ký tự.',
            ]
        );
        if ($request->filled('new_category')) {
            $category = Category::firstOrCreate(['name' => $request->new_category]);
            $request->merge(['parent_id' => $category->id]); // Gán parent_id là danh mục mới
        }
        if ($request->hasFile('image_cover')) {
            $imgCate = $request->file('image_cover')->store('uploads/Category', 'public');
            //dd($imgCate);
        } else {
            $imgCate = null;
        }
        $category = Category::create([
            'name' => $validatedData['name'],
            'note' => $validatedData['note'],
            'slug' => $validatedData['slug'],
            'image_cover' => $imgCate,
            'parent_id' => $validatedData['parent_id'],
        ]);
        return redirect()->route('admin.categories.list');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $listCate = Category::find($id);
        return view('admin::contents.categories.edit', compact('listCate', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $listCate = Category::findOrFail($id);
        if ($request->hasFile('image_cover')) {
            if ($listCate->image_cover) {
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
