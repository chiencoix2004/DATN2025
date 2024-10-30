<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        // dd($request->all());
        $message = [
            'full_name.regex' => 'Họ và tên chỉ được chứa chữ cái và khoảng trắng.',
            'email.regex' => 'Định dạng email không hợp lệ.',
            'password' => 'Mật khẩu chứa ít nhất 12 kỹ tự,1 chữ hoa,1 số và 1 ký tự đặc biệt',
            'password.confirmed' => 'Xác nhận mật khẩu chưa khớp'
        ];
        $validator = Validator::make($request->all(), [
            'full_name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s]+$/u'  
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'  // Định dạng email cơ bản
            ],
            'password' => [
                'required',
                'string',
                'min:12',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'  // Ít nhất một chữ hoa, một chữ thường, một số và một ký tự đặc biệt

               
            ],
        ], $message);

        if ($validator->fails()) {
            return redirect()->route('showForm')->withErrors($validator)->withInput();
        }


        $user = User::create([
            'user_name' => null,
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'verify' => '1',
            'status' => 'deactive',
            'user_image' => null,
            'roles_id' => 2,
            'phone' => null,
            'address' => null,
        ]);

        // dd($user);
        if ($user) {

            // Gửi email xác nhận
            $user->notify(new VerifyEmail());

            // return redirect()->route('verification.verify',$user->id);
        }

        // dd($user);

        // Gửi email xác nhận
        // $user->notify(new VerifyEmail());

        return redirect()->route('showForm')->with('success', 'Đăng ký thành công,vui lòng kiểm tra email để xác minh tài khoản.');
    }
}
