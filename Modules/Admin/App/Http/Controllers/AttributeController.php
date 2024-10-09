<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttributeController extends Controller
{
    public function listAttr()
    {
        return view('admin::contents.attributes.listAttr');
    }
    public function addAttr()
    {
        return view('admin::contents.attributes.addAttr');
    }
}
