<?php

namespace Modules\Client\App\Http\Controllers;


use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use App\Models\OrderDetailModel;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


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

        $orders = Order::where('users_id', auth()->id())->orderBy('date_create_order', 'desc')->paginate($perPage);

        $formattedOrders = $orders->getCollection()->map(function ($order) {

            $items_count = OrderDetailModel::where('order_id', $order->id)->count();
            $total_price = OrderDetailModel::where('order_id', $order->id)->sum('product_price_final');
            return [
                'id' => $order->id,
                'date' => $order->date_create_order ? Carbon::parse($order->date_create_order)->format('d-m-Y') : null,
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
        $order = Order::with('orderItems')->where('users_id',auth()->id())->findOrFail($id);
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

    public function downloadPDF($id)
    {
        // Lấy dữ liệu đơn hàng cùng với các sản phẩm liên quan
        $data = Order::query()->with('orderItems')->findOrFail($id);

        // Tạo PDF sử dụng view và dữ liệu
        $pdf = app(PDF::class)->loadView('admin::contents.orders.invoices.view', compact('data'))->setOptions([
            'isRemoteEnabled' => true,
            'chroot' => public_path(),
        ]);

        // Đặt tên file tùy chỉnh
        $date = Carbon::parse($data->date_create_order)->format('d-m-Y');
        $fileName = 'hóa đơn -' . $data->id . '-' . Str::slug($data->user_name) . "-$date" . '.pdf';

        // Trả về PDF dưới dạng file tải về
        return $pdf->download($fileName);
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);

        // dd($order);

        if ($order->status_order !== 'Chờ xác nhận' && $order->status_order !== 'Đã xác nhận') {
            return response()->json([
                'message' => 'Chỉ có thể hủy đơn hàng ở trạng thái Chờ xác nhận hoặc Đã xác nhận.',
            ], 400);
        };


        $order->status_order = 'Đơn hàng bị hủy';
        $order->save();

        return response()->json(['message' => 'Đơn hàng được hủy thành công.'], 200);
    }

    public function resetOrder($id)
    {
        $order = Order::findOrFail($id);

        // dd($order);

        if ($order->status_order !== 'Đơn hàng bị hủy') {
            return response()->json([
                'message' => 'Chỉ có thể đặt lại đơn hàng ở trạng thái hủy.',
            ], 400);
        }

        $order->status_order = 'Chờ xác nhận';
        $order->save();

        return response()->json(['message' => 'Đơn hàng đã được đặt lại thành công.'], 200);
    }


    // Phương thức đánh dấu đơn hàng là đã nhận
    public function markAsReceived($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại'], 404);
        }

        // Kiểm tra trạng thái của đơn hàng có phải 'đang giao'
        if ($order->status_order != 'Đang giao hàng') {
            return response()->json(['message' => 'Đơn hàng không thể được đánh dấu là đã nhận'], 400);
        }

        // Cập nhật trạng thái của đơn hàng
        $order->status_order = 'Đã nhận hàng'; // Hoặc trạng thái bạn muốn
        $order->save();

        return response()->json(['message' => 'Đơn hàng đã được đánh dấu là đã nhận'], 200);
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
}
