<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSupport;
use App\Models\CustomerSupportDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addTicket(Request $request)
    {
        $ticket = new CustomerSupport();
        //validate
        $this->validate($request, [
            'con_name' => 'required',
            'con_email' => 'required',
            'con_subject' => 'required',
            'con_message' => 'required',
        ]);
        $ticket_reply = "Tạo vé trợ giúp thành công vui lòng chờ khách hàng phản hồi";
        $ticket_reply_by = "created by user";
        try {
            $ticket->addTicket($request->con_user_id, $request->con_subject, $request->con_message, $request->con_subject, NULL);
            $ticket_id = $ticket->getlastticetid()->ticket_id;
            $detailticket = new CustomerSupportDetail();
            $detailticket->addmessage($ticket_id, $ticket_reply, NULL, $ticket_reply_by);
            //ai api
            return redirect()->back()->with('success', 'Tạo vé trợ giúp thành công')->with('ticket_id', $ticket_id);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
