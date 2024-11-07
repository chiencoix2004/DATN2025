<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function changePassword(Request $request)
    {   
        // dd($request->all());
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
        ];

        $rules = [
            'full_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ];

        // Kiểm tra nếu có mật khẩu mới thì thêm các quy tắc mật khẩu
        if ($request->new_password != null || $request->current_password != null) {
            $rules['current_password'] = 'required';
            $rules['new_password'] = 'required|string|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
            $rules['new_password_confirmation'] = 'required_with:new_password|same:new_password';
        }

        $request->validate($rules, $messages);

        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại nếu có thay đổi mật khẩu
        if ($request->new_password !=null && !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu cũ không đúng.']);
        }

        // Cập nhật thông tin người dùng
        if ($request->new_password != null) {
            $user->password = Hash::make($request->new_password);
        }

        $user->full_name = $request->full_name;

        // Cập nhật địa chỉ nếu có
        if ($request->filled('address')) {
            $user->address = $request->address;
        }

        $user->save();

        return redirect()->back()->with('success', 'Thông tin đã được cập nhật thành công.');
    }
}
