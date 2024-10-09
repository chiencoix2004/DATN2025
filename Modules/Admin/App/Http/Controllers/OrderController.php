<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listOrder()
    {
        return view('admin::contents.orders.orderlist');
    }
    public function orderDetail()
    {
        return view('admin::contents.orders.orderDetail');
    }
    public function orderTracking()
    {
        return view('admin::contents.orders.tracking');
    }
}
