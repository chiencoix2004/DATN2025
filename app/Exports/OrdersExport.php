<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;
    protected $status;
    protected $phone;
    protected $email;

    public function __construct($startDate, $endDate, $status, $phone, $email)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function collection()
    {
        $orders = OrderModel::query();

        if ($this->status) {
            $orders->where('status_order', $this->status);
        }

        if ($this->phone) {
            $orders->where('user_phone', 'like', '%' . $this->phone . '%');
        }

        if ($this->email) {
            $orders->where('user_email', 'like', '%' . $this->email . '%');
        }

        if ($this->startDate && $this->endDate) {
            $orders->whereBetween('date_create_order', [$this->startDate, $this->endDate]);
        }

        return $orders->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tên khách hàng',
            'Số điện thoại',
            'Email',
            'Địa chỉ',
            'Trạng thái',
            'Tổng tiền',
            'Ngày đặt hàng',
        ];
    }
}