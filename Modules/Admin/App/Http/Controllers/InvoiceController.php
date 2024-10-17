<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
// use Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function savePDF(Order $order)
    {
        $data = $order::query()->with('orderItems')->findOrFail($order->id);
        $pdf = PDF::loadView('admin::contents.orders.invoices.view', compact('data'))->setOptions(
            [
                'isRemoteEnabled' => true,
                'chroot' => public_path(),
            ]
        );
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Ymd');
        $fileName = 'invoice-' . $data->id . '-' . Str::slug($data->user_name) . "-$now" . '.pdf';
        $filePath = 'invoices/' . $fileName;
        Storage::disk('public')->put($filePath, $pdf->output());
        return redirect()->back()->with(['success' => 'In và lưu hóa đơn thành công!']);
        // return view('admin::contents.orders.invoices.view', compact('data'));
    }
    public function listPDF()
    {
        $files = File::files(storage_path('app/public/invoices ')); // Lấy danh sách file từ thư mục invoices
        $fileData = [];
        foreach ($files as $file) {
            $fileData[] = [
                'name' => $file->getFilename(), // Tên file
                'size' => $file->getSize(), // Dung lượng file
            ];
        }
        // Số lượng file mỗi trang
        $perPage = 10;
        // Lấy trang hiện tại từ URL (nếu không có trang nào, sẽ là 1)
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // Tạo một collection từ dữ liệu file
        $fileCollection = collect($fileData);
        // Lấy các file cho trang hiện tại
        $currentPageFiles = $fileCollection->slice(($currentPage - 1) * $perPage, $perPage)->all();
        // Tạo đối tượng LengthAwarePaginator
        $paginatedFiles = new LengthAwarePaginator(
            $currentPageFiles, // Các file trong trang hiện tại
            count($fileCollection), // Tổng số file
            $perPage, // Số lượng file mỗi trang
            $currentPage, // Trang hiện tại
            ['path' => url()->current()] // Đường dẫn hiện tại để phân trang
        );

        return view('admin::contents.orders.invoices.listInvoices', compact('paginatedFiles'));
    }
}
