<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSupport;
use App\Models\CustomerSupportDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function contact()
    {
        return view('client::contents.other-pages.contact-us');
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:account,product,order',
        ]);

        $ticket = new CustomerSupport();
        //dd($ticket = new CustomerSupport());
        $ticket->user_id = Auth::check() ? Auth::user()->id : null;
        $ticket->ticket_title = $request->title;
        $ticket->ticket_content = $request->content;
        $ticket->ticket_category = $request->category;
        $ticket->ticket_status = 1; // Hoặc trạng thái mặc định khác
        $ticket->ticket_date = now();
        $ticket->save();

        if ($ticket) {
            $detailticket = new CustomerSupportDetail();
            $detailticket->ticket_id = $ticket->ticket_id; 
            $detailticket->ticket_reply = $request->content;
            $detailticket->ticket_reply_by = 'client';
            $detailticket->ticket_reply_date = now();
            $detailticket->save();

            return redirect()->route('other.contactUs')->with('success', 'Cảm ơn bạn đã liên hệ!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra!');
        }
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
    public function update(Request $request, $id)
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
