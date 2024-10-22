<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    const TYPE_DISCOUNT = [
        'percent' => 'Phần trăm',
        'fixed' => 'Cố định',
    ];
    const STATUS_ORDER = [
        'reorder' => 'Đặt lại hàng',
        'pending' => 'Chờ xác nhận',
        'confirmed' => 'Đã xác nhận',
        'shipping' => 'Đang giao hàng',
        'received' => 'Đã nhận hàng',
        'canceled' => 'Đơn hàng bị hủy',
    ];
    const STATUS_PAYMENT = [
        'paid' => 'Đã thanh toán',
        'unpaid' => 'Chưa thanh toán',
    ];
    const METHOD_PAYMENT = [
        'cod' => 'Thanh toán khi nhận hàng',
        'momo_card' => 'Thanh toán qua thẻ MOMO',
        'momo_qr' => 'Thanh toán qua mã MOMO',
    ];
    const METHOD_SHIPPING = [
        'express' => 'Giao hàng nhanh',
        'normal' => 'Giao hàng tiết kiệm',
        'free_ship' => 'Giao hàng miễn phí',
    ];
    protected $fillable = [
        'users_id',
        'user_name',
        'user_phone',
        'user_email',
        'user_address',
        'user_note',
        'ship_user_name',
        'ship_user_phone',
        'ship_user_email',
        'ship_user_address',
        'ship_user_note',
        'status_order',
        'payment_method',
        'status_payment',
        'total_price',
        'date_create_order',
        'code_coupon',
        'discount_type',
        'discount',
        'shipping_method',
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getlast5Orders($users_id)
    {
        return $this->where('users_id', $users_id)->orderBy('id', 'desc')->limit(5)->get();
    }
}
