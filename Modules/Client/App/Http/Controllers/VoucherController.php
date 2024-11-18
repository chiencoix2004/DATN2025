<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CouponModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function listVoucher(Request $request)
    {
        // $perPage = 9;
        // $coupons = CouponModel::where('date_start', '<=', now())
        //     ->where('date_end', '>=', now())
        //     ->where(function ($query) {
        //         $query->whereNull('quantity')
        //               ->orWhere('quantity', '>', 0);
        //     });
        // // Tìm kiếm
        // if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $coupons->where(function ($query) use ($search) {
        //         $query->where('name', 'like', '%' . $search . '%')
        //               ->orWhere('code', 'like', '%' . $search . '%');
        //     });
        // }
        // $coupons = $coupons->paginate($perPage);
        // if ($request->ajax()) {
        //     return view('client::contents.voucher.list_voucher_data', compact('coupons'))->render(); 
        // }
        // return view('client::contents.voucher.list_voucher', compact('coupons'));
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
