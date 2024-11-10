<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\PasswordChangedMail ;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client::index');
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
        return redirect()->route('home');
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
    public function update(Request $request)
    {
        if ($request->isMethod('get')) {
            // Hiển thị form đổi mật khẩu
            return view('client::contents.auth.change-password'); 
        }
        // Xử lý đổi mật khẩu (method POST)
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:12',
        ]);
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => __('Mật khẩu hiện tại không chính xác.')]);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        // Gửi email thông báo đổi mật khẩu thành công
        Mail::to($user->email)->send(new PasswordChangedMail($user));
        return back()->with('status', __('Mật khẩu của bạn đã được thay đổi!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
