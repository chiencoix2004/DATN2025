<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
        $data = Order::query()->paginate(10);
        $statusOrder = Order::STATUS_ORDER;
        $statusPayment = Order::STATUS_PAYMENT;
        return view('admin::contents.orders.orderlist', compact('data', 'statusOrder', 'statusPayment'));
    }
    public function orderDetail(Order $order)
    {
        $data = $order::query()->with('orderItems')->findOrFail($order->id);
        $statusOrder = Order::STATUS_ORDER;
        $statusPayment = Order::STATUS_PAYMENT;
        return view('admin::contents.orders.orderDetail', compact('data', 'statusOrder', 'statusPayment'));
    }
    public function orderUpdate(Request $request, Order $order)
    {
        $data = $order::query()->findOrFail($order->id);
        $data->update(['status_order' => Order::STATUS_ORDER[$request->status_order]]);
        return redirect()->back()->with(['success' => 'Cập nhật trạng thái đơn hàng thành công!']);
    }
}
