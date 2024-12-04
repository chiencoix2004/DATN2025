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
            ->select('id', 'full_name', 'email','user_image')
            ->where('roles_id', 2)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
        $countUser = User::query()
            ->select('id', 'full_name', 'email','user_image')
            ->where('roles_id', 2)
            ->count();

        // Lấy doanh số cho 12 tháng
        $salesData = [];
        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths($i)->format('Y-m'); // Lấy tháng hiện tại trừ đi i tháng
            $sales = Order::where('date_create_order', 'like', $month . '%')
            ->sum('total_price'); // Tính tổng doanh thu cho tháng đó

            $salesData[] = $sales; // Lưu doanh thu theo tháng
        }
        // Đảo ngược mảng để có thứ tự từ tháng 1 đến tháng 12
        $salesData = array_reverse($salesData);
        
        // dd($salesData);


        return view('admin::contents.dashboard', compact('order', 'bestSell', 'listUser','countUser','salesData'));
    }
}
