<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $table = 'wallet';
    protected $fillable = [
        'user_id',
        'wallet_account_id',
        'wallet_balance_available',
        'wallet_status',
        'wallet_user_level',
        'wallet_trust_device_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function checkWalletVaild($user_id)
{
    return $this->where('user_id', $user_id)->exists();
}
}

