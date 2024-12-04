<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{

    public function index()
    {
        $order = Order::query()
            ->select('id', 'status_order','status_payment')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        $bestSell = Product::select('products.*')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.status_payment', 'Đã thanh toán')
            ->groupBy('products.id')
            ->selectRaw('products.*, SUM(order_details.product_quantity) as total_quantity')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        $listUser = User::query()
            ->select('id', 'full_name', 'email')
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('admin::contents.dashboard', compact('order', 'bestSell'));
    }
}
