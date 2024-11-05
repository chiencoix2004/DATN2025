<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetailModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd($myOrder);
        return view('client::contents.auth.my-account');
    }

    public function getOrders(Request $request)
    {

        $perPage = 5;

        $orders = Order::where('users_id', auth()->id())->orderBy('created_at', 'desc')->paginate($perPage);

        $formattedOrders = $orders->getCollection()->map(function ($order) {

            $items_count = OrderDetailModel::where('order_id', $order->id)->count();
            $total_price = OrderDetailModel::where('order_id', $order->id)->sum('product_price_final');
            return [
                'id' => $order->id,
                'date' => $order->created_at ? $order->created_at->format('d-m-Y') : null,
                'status' => $order->status_order,
                'total' => number_format($total_price, 0, ',', '.') . " VND cho {$items_count} sản phẩm"
            ];
        });


        return response()->json([
            'orders' => $formattedOrders,
            'pagination' => [
                'current_page' => $orders->currentPage(),
                'last_page' => $orders->lastPage(),
                'next_page_url' => $orders->nextPageUrl(),
                'prev_page_url' => $orders->previousPageUrl()
            ]
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('client::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('client::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function myOrder($id)
    {
        //
    }
}
