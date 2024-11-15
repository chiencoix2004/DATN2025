<?php

namespace Modules\Wallet\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vnpay;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\Return_;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wallet::index');
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
        //sending postdata to show result rediect to result page
        return view('wallet::transhistory.resultvnpay',compact('returndata'));

    }



}
