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
       

        $user = User::create([
            'user_name' => null,
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'verify' => '1',
            'status' => 'deactive',
            'user_image' => null,
            'roles_id' => 2, // 2 là role client
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

        return redirect()->route('showForm');
    }
}
