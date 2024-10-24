<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticateController extends Controller
{
    public function showLoginForm()
    {

        return view('admin::authentic.index');
    }
    public function PostLogin(Request $req)
    {
        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password,
        ];

        $remember = $req->has('remember');

        if (Auth::attempt($dataUserLogin, $remember)) {
            $user = Auth::user();

            if ($user->roles_id == '1') { // Kiểm tra role == 1 là admin
                // Đăng nhập thành công admin
                return redirect()->route('admin::contents.dashboard')->with([
                    'message' => 'Đăng nhập thành công'
                ]);
            } else {
                // Đăng nhập thành công user thông thường
                return redirect()->route('.')->with([
                    'message' => 'Đăng nhập thành công',
                    'user' => $user  // Truyền thông tin người dùng
                ]);
            }
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->with([
                'message' => 'Email hoặc mật khẩu không đúng'
            ]);
        }
    }

}
