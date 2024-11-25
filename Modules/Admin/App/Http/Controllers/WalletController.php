<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use App\Models\Wallet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;
use App\Models\Trx_history;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $withdraw = new Withdraw();
         $data = $withdraw->listAllwithdraw();

       return view('admin::wallet.list', compact('data'));
    }

    public function withdraw($id){
        $withdraw = new Withdraw();
        $data = $withdraw->getwithdraw($id);
        $wallet_id  =  $data->wallet_account_id;
        $list_user = $withdraw->listwithdrawAccount5($wallet_id );
       //dd($data);
        return view('admin::wallet.detail', compact('data','list_user'));
    }
    public function updatepost(Request $request){
        $status = $request->status;
        $withdraw_request_id = $request->withdraw_request_id;
        $admin_note = $request->admin_note;
        $trx_id = $request->trx_id;
        $data = [
            'status'=> $status,
            'admin_note'=> $admin_note,
            'admin_response_date'=> date('Y-m-d H:i:s')
        ];
        $data_trx = [
            'trx_status' => 1,
            'updated_at' =>  date('Y-m-d H:i:s')
        ];
        $withdraw = new Withdraw();
        try{
           $data =  $withdraw->updatewithdraw($withdraw_request_id, $data);
            if ($data){
                $trx = new Trx_history();
                try{
                    $trx->updateTrx($trx_id, $data_trx);
                    return back()->with('success', 'Yêu cầu đã được cập nhật');
                } catch(Exception $e){
                    dd($e);
                }

            }
        } catch(Exception $e){
            dd($e);
        }

    }

    public function holdback(Request $request){
        $status = $request->status;
        $withdraw_request_id = $request->withdraw_request_id;
        $admin_note = $request->admin_note;
        $trx_id = $request->trx_id;
        $data = [
            'status'=> 4,
            'admin_note'=> $admin_note,
            'admin_response_date'=> date('Y-m-d H:i:s')
        ];
        $data_trx = [
            'trx_status' => 2,
            'updated_at' =>  date('Y-m-d H:i:s')
        ];
        $withdraw = new Withdraw();
        try{
           $data =  $withdraw->updatewithdraw($withdraw_request_id, $data);
            if ($data){
                $trx = new Trx_history();
                try{
                    $trx->updateTrx($trx_id, $data_trx);
                    return back()->with('success', 'Yêu cầu đã được cập nhật');
                } catch(Exception $e){
                    dd($e);
                }

            }
        } catch(Exception $e){
            dd($e);
        }

    }
    public function lockwallet(Request $request){
        $status = $request->status;
        $withdraw_request_id = $request->withdraw_request_id;
        $admin_note = $request->admin_note;
        $trx_id = $request->trx_id;
        $user_id = $request->user_id;
        $data_wallet = [
            'status'=> 3,
            'admin_note'=> $admin_note,
            'admin_response_date'=> date('Y-m-d H:i:s')
        ];
        $trx_data = [
            'trx_status' => 2,
            'updated_at' =>  date('Y-m-d H:i:s')
        ];
        $withdraw = new Withdraw();
        try{
           $data =  $withdraw->updatewithdraw($withdraw_request_id, $data_wallet);
            if ($data){
                $withdraw = new Withdraw();
                $data =  $withdraw->updatewithdraw($withdraw_request_id, $trx_data);

                try{
                    $wallet  = new Wallet();
                    $wallet ->setLockedWallet($request->wallet_id);
                    $wallet ->updateAdminNote($request->wallet_id, $admin_note);
                    return back()->with('success', 'Yêu cầu đã được cập nhật');
                } catch(Exception $e){
                    dd($e);
                }

            }
        } catch(Exception $e){
            dd($e);
        }

    }

    public function listallwallet(){
        $wallet = new Wallet();
        $data = $wallet->listAllWallet();
        //dd($data);
        return view('admin::wallet.listuser', compact('data'));
    }

    public function walletinfo($id){
        $wallet = new Wallet();
        $data = $wallet->getWalletInfo($id);
        $trx = new Trx_history();
        $data_trx = $trx->gettrxuser($id);
        dd($data_trx);

        return view('admin::wallet.userdetal', compact('data','data_trx'));
    }
}
