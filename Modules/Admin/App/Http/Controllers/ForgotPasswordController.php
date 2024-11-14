<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\App\Notifications\AdminResetPassword;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('admin::contents.forgot-password.forgot-password');
    }

    public function postForgotPassword(Request $request): RedirectResponse
    {
        
        $request->validate(['email' => 'required|email']);
        
        $status = Password::sendResetLink($request->only('email'));
        
        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('admin.confirm.mail')
                ->with([
                    'success' => 'Liên kết đặt lại mật khẩu đã được gửi đến email của bạn.',
                    'email' => $request->email
                ]);
        } else {
            return redirect()->back()->with('error','Đã xảy ra lỗi, vui lòng thử lại sau.');
        }
    }
    public function resetPassword(Request $request, $token)
    {
        return view('admin::contents.forgot-password.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    public function postResetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/',
            'password_confirmation' => 'required_with:password|same:password',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.string' => 'Mật khẩu phải là chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'password.regex' => 'Mật khẩu cần chứa ít nhất 1 chữ, 1 số và 1 ký tự đặc biệt',

            'password_confirmation.required_with' => 'Vui lòng xác nhận mật khẩu.',
            'password_confirmation.same' => 'Mật khẩu xác nhận không khớp với mật khẩu.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($validator->fails());
       
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            DB::table('password_reset_tokens')->where('email', $request->input('email'))->delete();
            return redirect()->route('login.admin')->with('status', __($status));
        } else {
            return back()->withErrors(['email' => [__($status)]]);
        }
    }

    public function confirmMail()
    {
        return view('admin::contents.forgot-password.confirm-mail');
    }
}
