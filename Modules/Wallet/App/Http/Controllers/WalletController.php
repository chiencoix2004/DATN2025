<?php

namespace Modules\Wallet\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trx_history;
use App\Models\Trx_history_detail;
use App\Models\Vnpay;
use App\Models\Wallet;
use App\Models\Withdraw;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallet = new Wallet();
        $user_id = auth()->user()->id;
        $data = $wallet->getWallet($user_id);
        $wallet_account_id = $data->wallet_account_id;
        $trx_history = new Trx_history();
        $trx_data = $trx_history->get20trx($wallet_account_id);
        $withdraw = new Withdraw();
        $withdraw_toal = $withdraw->countAmmountPed($wallet_account_id);
        return view('wallet::index', compact('data','trx_data','withdraw_toal'));
    }
    public function topup() {
        return view('wallet::trans.topup');

    }
    public function charge(Request $request){
       $decimal_Ammount = $request->ammount;
       // echo $decimal_Ammount;
       //format to integer
       $intammount = ($decimal_Ammount/1)*100;
      // echo($intammount);
        $new_Payment =  new Vnpay();
       try {
        $new_Payment->create_payment($intammount,"vn");
       } catch (\Exception $e) {
        return redirect()->back()->with("error", $e->getMessage());
       }

    }
    public function callbackvnpaydata(){
        $user_id = Auth::user()->id;
        $wallet = new Wallet();
        $walletaccount = $wallet->getWallet($user_id);
        $wallet_account_id = $walletaccount->wallet_account_id;

        $returndata = [
            'Ammout' => $_GET['vnp_Amount'],
            'Bankcode' => $_GET['vnp_BankCode'],
            'vnp_BankTranNo' => isset($_GET['vnp_BankTranNo']) ? $_GET['vnp_BankTranNo'] : "",
            'vnp_CardType' => $_GET['vnp_CardType'],
            'vnp_PayDate' => $_GET['vnp_PayDate'],
            'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
            'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
            'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
            'vnp_TxnRef' => $_GET['vnp_TxnRef'],
            'vnp_SecureHash' => $_GET['vnp_SecureHash'],
        ];

        if($_GET['vnp_ResponseCode'] == 00){
            $hashcheck = new Trx_history();
            $data = $hashcheck->checkHash($_GET['vnp_SecureHash']);
            if(empty($data)){
                $data = [
                    'wallet_account_id' => $wallet_account_id,
                    'trx_type' => "topup",
                    'trx_from' => "vnpay",
                    'trx_to' => "wallet",
                    'trx_amount'=>($_GET['vnp_Amount'] / 100),
                    'trx_balance_available' => $walletaccount->wallet_balance_available + ($_GET['vnp_Amount'] / 100),
                    'trx_hash_request' => $_GET['vnp_SecureHash'],
                    'trx_status' => 1,
                    'created_at' => $_GET['vnp_PayDate'],
                    'updated_at' => $_GET['vnp_PayDate']
                ];
                try{
                    $trx = new Trx_history();
                    $trx->createTrx($data);
                    if($trx){
                        $trx_id = $trx->getLasttrxid();
                        $trx_lastid = $trx_id->trx_id;
                        $data_trx_detail = [
                            'trx_id' => $trx_lastid,
                            'trx_detail_desc' => "Nap tien qua VNPAY",
                            'trx_date_issue' => $_GET['vnp_PayDate'],
                            'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
                            'vnp_SecureHash' => $_GET['vnp_SecureHash'],
                            'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
                            'vnp_TxnRef' => $_GET['vnp_TxnRef'],
                            'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
                            'vnp_PayDate' => $_GET['vnp_PayDate'],
                            'vnp_CardType' => $_GET['vnp_CardType'],
                            'BankCode' => $_GET['vnp_BankCode'],
                        ];
                        $trx_detail = new Trx_history_detail();
                        $trx_detail->createTrxDetail($data_trx_detail);
                        if($trx_detail){
                            $wallet->addBalance($wallet_account_id, $_GET['vnp_Amount'] / 100);
                            return view('wallet::transhistory.resultvnpay', compact('returndata'));
                        }
                    }
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            } else {
                return view('wallet::transhistory.resultvnpay', compact('returndata'));
            }
        }
        return view('wallet::transhistory.resultvnpay', compact('returndata'));
    }
    public function transaction($id){
        $trans = new Trx_history();
        $data = $trans->trans_detail( $id );
        if($data->first()->withdraw_request_id == null){
            $data_non_withdraw = $trans->trans_detail( $id );
            return view('wallet::transhistory.detail', compact('data'));
        } else {
            $data = $trans->trans_detail_withdraw($id);
         return view('wallet::transhistory.detail', compact('data'));
        }

    }



}
