<?php

namespace Modules\Wallet\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserEkyc;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Exception;
use Carbon\Carbon;

class EkycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wallet::ekyc.wellcome');
    }

    public function verifyadress()
    {
        $user = new User();
        $userkyc = new UserEkyc();
        $info = $userkyc->getUserKycInfo(Auth::user()->id);
        if ($info) {
            return view('wallet::ekyc.address', compact('info'));
        } else {
            $info = $user->getUser(Auth::user()->id);
            return view('wallet::ekyc.address', compact('info'));
        }
    }

    public function uploadadress(Request $request)
    {
        $dob = $request->date_of_birth;
        // Check if user is 18 years old
        $age = Carbon::parse($dob)->age;
        if ($age < 18) {
            return redirect()->back()->withErrors(['date_of_birth' => 'Bạn phải đủ 18 tuổi để sử dụng dịch vụ này.']);
        }

        $data = [
            'user_id' => Auth::user()->id,
            'frist_name' => $request->frist_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'adress' => $request->adress,
            'phone_number' => $request->phone_number,
            'place_of_residence' => $request->place_of_residence,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
        ];

        $userkyc = new UserEkyc();
        $datauser = $userkyc->getUserKycInfo(Auth::user()->id);
        if ($datauser) {
            $userkyc->updateuserinfo(Auth::user()->id, $data);
        } else{
            try {
                $userkyc->adduserinfo($data);
                $userkyc->setfillekyc(Auth::user()->id);
                $userkyc->setStatusPendingFilled(Auth::user()->id);
                return redirect()->route('ekyc.verifykyc');
            } catch (Exception $e) {
                return dd($e->getMessage());
            }
        }
    }

    public function verifykyc()
    {
        $user = new User();
        $info = $user->getUser(Auth::user()->id);
        return view('wallet::ekyc.idcard', compact('info'));
    }

    public function uploadkyc(Request $request){
        if($request->id_number == empty($request->id_number)){
            return redirect()->back()->withErrors(['id_number' => 'Vui lòng nhập số CMND/CCCD']);
        }
    }
    public function step2skip(Request $request){
        $user = new User();
        $user->setfilltos(Auth::user()->id);
        return redirect()->route('ekyc.verifytos');

    }

    public function verifytos()
    {
        $user = new User();
        $info = $user->getUser(Auth::user()->id);
        return view('wallet::ekyc.tos', compact('info'));
    }
}
