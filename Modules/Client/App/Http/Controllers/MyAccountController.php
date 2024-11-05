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

    public function getOrderDetails($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);

        return response()->json([
            'id' => $order->id,
            'user_note' => $order->user_note,
            'status' => $order->status_order,
            'items' => $order->orderItems->map(function ($item) {
                return [
                    'name' => $item->product_name,
                    'image' => $item->product_avatar,
                    'quantity' => $item->product_quantity,
                    'price' => number_format($item->product_price_final, 2),
                    'total' => number_format($item->product_quantity * $item->product_price_final, 2)
                ];
            }),
            'grand_total'  => number_format($order->orderItems->sum(function ($item) {
                return $item->product_quantity * $item->product_price_final;
            }), 0, ',', '.') . ' VND',
            'discount' => number_format($order->discount, 0, ',', '.') . ' VND',
            'total' => number_format($order->total_price, 0, ',', '.') . ' VND',
            'shipping' => [
                'name' => $order->ship_user_name,
                'address' => $order->ship_user_address,
                'email' => $order->ship_user_email,
                'phone' => $order->ship_user_phone,
            ],
            'billing' => [
                'status_payment' => $order->status_payment,
                'payment_method' => $order->payment_method,
            ],
            'delivery' => [
                'shipping_method' => $order->shipping_method,
                'order_id' => $order->id,
            ],
        ]);
    }

    public function savePDF($id)
    {
        $data = Order::query()->with('orderItems')->findOrFail($id);
        $pdf = PDF::loadView('admin::contents.orders.invoices.view', compact('data'))->setOptions(
            [
                'isRemoteEnabled' => true,
                'chroot' => public_path(),
            ]
        );
        $date = Carbon::parse($data->date_create_order)->format('Y-m-d');
        $fileName = 'invoice-' . $data->id . '-' . Str::slug($data->user_name) . "-$date" . '.pdf';
        $filePath = 'invoices/' . $fileName;
        Storage::disk('public')->put($filePath, $pdf->output());
        return redirect()->back()->with(['success' => 'In và lưu hóa đơn thành công!']);
        // return view('admin::contents.orders.invoices.view', compact('data'));
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
