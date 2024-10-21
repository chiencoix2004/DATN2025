<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function listProduct()
    {
        return view('admin::contents.products.listProduct');
    }
    public function showFormAdd()
    {
        return view('admin::contents.products.showForm');
    }
    public function createProduct(Request $request)
    {
        dd($request->all());
    }
}
