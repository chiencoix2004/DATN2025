<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSupport;
use App\Models\CustomerSupportDetail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $listTicket = new CustomerSupport();
         $listTicket = $listTicket->listTicket();
         $countOpen = $listTicket->where('ticket_status', 1)->count();
         $countClose = $listTicket->where('ticket_status', 2)->count();
        $countSpam = $listTicket->where('ticket_status', 3)->count();
        return view('admin::ticket.list', compact('listTicket', 'countOpen', 'countClose', 'countSpam'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::create');
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
    public function show($id,$user_id)
    {
       if($id){
        $detailticket = new CustomerSupportDetail();
        $detailticket = $detailticket->getdetail($id);
        $account = new User();
        $account = $account->getUser($user_id);
        $order = new Order();
        $order = $order->getlast5Orders($user_id);
        return view('admin::ticket.chat', compact('detailticket', 'account', 'order'));
       }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin::edit');
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
