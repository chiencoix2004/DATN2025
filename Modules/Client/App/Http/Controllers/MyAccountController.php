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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {           
        $user = Auth::user();
        return view('client::contents.auth.my-account', compact('user'));
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

    //chi tiết tài khoản
    // public function accountDetail(){
    //     $user = auth()->user();
    //     return view('client::contents.auth.my-account', compact('user'));
    // }
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
    public function changePassword(Request $request)
    {
        $messages = [
            'full_name.required' => 'Trường họ và tên là bắt buộc.',
            'full_name.string' => 'Trường họ và tên phải là một chuỗi ký tự.',
            'full_name.max' => 'Trường họ và tên không được vượt quá 255 ký tự.',
            'current_password.required' => 'Trường mật khẩu hiện tại là bắt buộc.',
            'new_password.required' => 'Trường mật khẩu mới là bắt buộc.',
            'new_password.string' => 'Mật khẩu mới phải là một chuỗi ký tự.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password.confirmed' => 'Mật khẩu mới và xác nhận mật khẩu không khớp.',
            'new_password.regex' => 'Mật khẩu mới phải có ít nhất một chữ cái, một chữ số và một ký tự đặc biệt.',
            'new_password_confirmation.required_with' => 'Trường xác nhận mật khẩu mới là bắt buộc khi có mật khẩu mới.',
            'new_password_confirmation.same' => 'Xác nhận mật khẩu mới phải giống với mật khẩu mới.',
            'address.string' => 'Địa chỉ phải là một chuỗi ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'phone.required' => 'Trường số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại phải là dãy số hợp lệ.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
        ];
    
        $rules = [
            'full_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'required|regex:/^\d{10,15}$/|max:15',
        ];
    
        if ($request->new_password != null || $request->current_password != null) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|string|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
            $rules['new_password_confirmation'] = 'required_with:new_password|same:new_password';
        }
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = Auth::user();
    
        if ($request->new_password != null && !Hash::check($request->current_password, $user->password)) {
            return response()->json(['error' => 'Mật khẩu cũ không đúng.'], 400);
        }
    
        if ($request->new_password != null) {
            $user->password = Hash::make($request->new_password);
        }
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
    
        if ($request->filled('address')) {
            $user->address = $request->address;
        }
    
        $user->save();
    
        return response()->json(['success' => true, 'message' => 'Thông tin đã được cập nhật thành công.']);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
