<?php

namespace Modules\Wallet\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OTP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Trx_history;
use App\Models\Trx_history_detail;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OtpEmail;
use Exception;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderid = $_GET['orderid'];
        $ammount = $_GET['ammount'];
        $ordertype = $_GET['ordertype'];
        // $hashrequest = $_GET['hashrequest'];
        // $created_date = $_GET['created_date'];
        // $expriy_date = $_GET['expriy_date'];

        if(empty( $orderid )){
            echo('missing arguments');
        } elseif(empty( $ammount )) {
            echo('missing arguments');
        } elseif(empty( $ordertype )) {
            echo('missing arguments');
        // } elseif(empty( $hashrequest )) {
        //     echo('missing arguments');
        // } elseif(empty( $created_date )) {
        //     echo('missing arguments');
        // } elseif(empty( $expriy_date )) {
        //     echo('missing arguments');
        } else {
            $array_data = [
                'orderid' => $orderid,
                'ammount' => $ammount,
                'ordertype' => $ordertype
            ];
        //tokenize data
        $token = base64_encode(json_encode($array_data));
        $url =  route('wallet.pay.token', ['id' => $token]);
        return redirect($url);
        }
    }
    public function token($id){

        if (empty($id)) {
            return response()->json(['error' => 'missing token'], 400);
        }

        $decoded_data = json_decode(base64_decode($id), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'invalid token'], 400);
        }
        $user_id = Auth::user()->id;
        $wallet = new Wallet();
        $walletaccount = $wallet->getWallet($user_id);

        return view('wallet::paygate.detail', ['data' => $decoded_data, 'walletaccount' => $walletaccount], compact('id'));
    }

    public function otp(Request $request){
        $id = $request->token;
        if (empty($id)) {
            return response()->json(['error' => 'missing token'], 400);
        }

        $decoded_data = json_decode(base64_decode($id), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'invalid token'], 400);
        }
        $user_id = Auth::user()->id;
        $user = Auth::user();
        $wallet = new Wallet();
        $walletaccount = $wallet->getWallet($user_id);
        $otp = new OTP();
        //delete all otp code of user
        $otp->deleteUserOTP($user_id);
        $otp_code = $otp->create_otpcode($user_id);
        $data = [
            'otp_code'=> $otp_code,
            'full_name' => $user->full_name,
            'ammount' => $decoded_data['ammount'],
        ];
        if ($otp_code) {
            try{
                $user = User::find($user_id);
                $user->notify(new OtpEmail($data));
                return view('wallet::paygate.otp', ['data' => $decoded_data, 'walletaccount' => $walletaccount], compact('id'));
            } catch (Exception $e) {
                dd($e);
            }

        }
    }
    public function chagre (Request $request){

        $id = $request->token;
        if (empty($id)) {
            return response()->json(['error' => 'missing token'], 400);
        }

        $decoded_data = json_decode(base64_decode($id), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'invalid token'], 400);
        }
        $user_id = Auth::user()->id;
        $wallet = new Wallet();
        $walletaccount = $wallet->getWallet($user_id);
        $otpstring = $request->digit1 . $request->digit2 . $request->digit3 . $request->digit4 . $request->digit5;
        $otp = new OTP();
        $data = $otp->verifyOTP($otpstring);
        if (empty($data)) {
            return redirect()->back()->with('error', 'Mã OTP không hợp lệ hoặc đã hết hạn');
        } else {
            $otp->deleteCode($otpstring);

        }
    }
    public function resendtotp ($id){
        if (empty($id)) {
            return response()->json(['error' => 'missing token'], 400);
        }

        $decoded_data = json_decode(base64_decode($id), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'invalid token'], 400);
        }
        $user_id = Auth::user()->id;
        $user = Auth::user();
        $wallet = new Wallet();
        $walletaccount = $wallet->getWallet($user_id);
        $otp = new OTP();
        $otp->deleteUserOTP($user_id);
        $otp_code = $otp->create_otpcode($user_id);
        $data = [
            'otp_code'=> $otp_code,
            'full_name' => $user->full_name,
            'ammount' => $decoded_data['ammount'],
        ];
        if ($otp_code) {
            try{
                $user = User::find($user_id);
                $user->notify(new OtpEmail($data));
                return view('wallet::paygate.otp', ['data' => $decoded_data, 'walletaccount' => $walletaccount], compact('id'));
            } catch (Exception $e) {
                dd($e);
            }

        }
    }

}

