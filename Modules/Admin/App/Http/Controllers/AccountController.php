<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin::contents.authentication.listAcc');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
    }
}
