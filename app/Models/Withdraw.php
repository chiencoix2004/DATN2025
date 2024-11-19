<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $table = "withdraw_request";
    protected $fillable = [
        "withdraw_request_id",
        "wallet_account_id",
        "amount",
        "bank_account_number",
        "bank_account_name",
        "bank_name",
        "status",
        "description",
        "request_date",
        "admin_response_date",
        "admin_note"
    ];
    //1 - ped , 2 - approved , 3 - rejected


    public function countAmmountPed($wallet_account_id){
        return $this->where('wallet_account_id',$wallet_account_id)
        ->where('status',1)
        ->sum('amount');
    }
}
