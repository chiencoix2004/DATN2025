<?php

namespace Modules\Wallet\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Trx_history;
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
        $user_id = Auth::user();
        dd($user_id);
        $wallet = new Wallet();
        $walletaccount = $wallet->getWallet($user_id);
        $wallet_account_id = $wallet->wallet_account_id;
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
        if($_GET['vnp_ResponseCode'] = 00){
            //1 check if hash existed system -> if not -> update balance ->if yes -> return error
            $hashcheck = new Trx_history();
            $data = $hashcheck->checkHash($_GET['vnp_SecureHash']);
            if($data==true){
                echo "Error";
            }else{
              $data_trx = [
                    'wallet_account_id' => $wallet_account_id,
                    'trx_type' => "topup",
                    'trx_from' => "vnpay",
                    'trx_to' => "wallet",
                    'trx_amount'=>$_GET['vnp_Amount'],
                    'trx_balance_available' => $walletaccount->wallet_balance_available + $_GET['vnp_Amount'],
                    'trx_hash_request' => $_GET['vnp_SecureHash'],
                    'trx_status' => 1
                    ];
                try{
                    $trx = new Trx_history();
                    $trx->createTrx($data_trx );
                    if($trx){
                      $trx_id = $trx->getLasttrxid();
                      echo ($trx_id);

                    }
                } catch (\Exception $e) {
                    return redirect()->back()->with("error", $e->getMessage());
                }
            }
        }

    }
    public function transaction($id){
        $trans = new Trx_history();
        $data = $trans->trans_detail($id);
        // dd($data);
        return view('wallet::transhistory.detail',compact('data'));

    }



}
