<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'user_name',
        'phone',
        'email',
        'password',
        'address',
        'user_image',
        'roles_id',
        'fullname',
        'verify',
        'status',
        'name',
        'email_verified_at',
    ];

    public function role()
    {
        return $this->belongsTo(RoleModel::class, 'roles_id');
    }

    public function orders()
    {
        return $this->hasMany(OrderModel::class, 'users_id');
    }

    public function comments()
    {
        return $this->hasMany(CommentModel::class, 'users_id');
    }
}
