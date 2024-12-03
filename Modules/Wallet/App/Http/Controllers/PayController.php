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
        $order_id = $_GET['order_id'];
        $user_id = $_GET['user_id'];
        $ammount = $_GET['ammount'];
        $shop_name = $_GET['shop_name'];
        $shop_desciprtion = $_GET['shop_desciprtion'];
        $order_type = $_GET['order_type'];
        $date_created = $_GET['date_created'];
        if(empty( $order_id )){
            echo('missing arguments');
        } elseif(empty( $user_id )) {
            echo('missing arguments');
        } elseif(empty( $ammount)) {
            echo('missing arguments');
        // } elseif(empty( $hashrequest )) {
        //     echo('missing arguments');
        // } elseif(empty( $created_date )) {
        //     echo('missing arguments');
        // } elseif(empty( $expriy_date )) {
        //     echo('missing arguments');
        } else {
            $array_data = [
                'order_id' => $order_id,
                'user_id' => $user_id,
                'ammount'=> $ammount,
                'shop_name' => $shop_name,
                'shop_desciprtion' => $shop_desciprtion,
                'order_type' => $order_type,
                'date_created'=> $date_created,
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
        if(empty($id)){
            $id = $_GET['id'];
        }
        $user_id = Auth::user()->id;
        $wallet = new Wallet();
        $walletaccount = $wallet->getWallet($user_id);
        if (empty($id)) {
            return response()->json(['error' => 'missing token'], 400);
        }
        if($walletaccount->wallet_status != 1){
            return redirect()->back()->with('error', 'Ví tiền của bạn đã bị vô hiệu hóa');
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
        if(empty($id)){
            $id = $_GET['id'];
        }

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
            $error = "Mã OTP không chính xác hoăc đã hết hạn";
            return view('wallet::paygate.otp', ['data' => $decoded_data, 'walletaccount' => $walletaccount], compact('id','error'));
        } else {
            $otp->deleteCode($otpstring);
            $key = env('VNP_HASH_SECRET'); // Replace with your actual secret key
            $hashmac = hash_hmac('sha512', $id . date('Y-m-d H:i:s'), $key);
            $data = [
                'wallet_account_id' => $walletaccount->wallet_account_id,
                'trx_type' => "deposit",
                'trx_from' => "Wallet",
                'trx_to' => "Shop",
                'trx_amount' => ($decoded_data['ammount']),
                'trx_balance_available' => $walletaccount->wallet_balance_available - ($decoded_data['ammount']),
                'trx_hash_request' => $hashmac ,
                'trx_status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $trx = new Trx_history();
            $trx->createTrx($data);
            $trx_id = $trx->getLasttrxid();
            $trx_lastid = $trx_id->trx_id;
            $data_trx_detail = [
                'trx_id' => $trx_lastid,
                'trx_detail_desc' => "Thanh toán đơn hàng " . $decoded_data['order_id']. " tại " . $decoded_data['shop_name'],
                'trx_date_issue' => date('Y-m-d H:i:s'),
                'vnp_SecureHash' => $hashmac,
            ];
            try {
                $trx_detail = new Trx_history_detail();
                $trx_detail->createTrxDetail($data_trx_detail);
                $wallet->takeBalance($walletaccount->wallet_account_id, $decoded_data['ammount']);
                $querybuilder = "?status=success&order_id=" . $decoded_data['order_id'] . "&ammount=" . $decoded_data['ammount']. "&user_id=" . $decoded_data['user_id'];
                 $link = route('handlewallet') . $querybuilder;
                return redirect($link);
            } catch (Exception $e) {
                $querybuilder = "?status=failed&order_id=" . $decoded_data['order_id'] . "&ammount=" . $decoded_data['ammount']. "&user_id=" . $decoded_data['user_id'];
                $link = route('handlewallet') . $querybuilder;
                return redirect($link);
            }
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
