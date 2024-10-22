<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_name",
        "full_name",
        "phone",
        "email",
        "password",
        "address",
        'user_image',
        "roles_id",
        'status',
        'verify',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function role(){
    //     return $this->belongsTo(Role::class);
    // }

    public function create_user($full_name,$email,$address,$user_image){
        return $this->insert([
            'fullname' => $full_name,
            'email' => $email,
            'address' => $address,
            'user_image' => $user_image,
            'user_name' => $email,
            //testing default data
            'password' => bcrypt('123456'),
            'roles_id' => 2,
            'status' => 'active',
            'verify' => 1,

        ]);


    }
    public function listUser(){
        return $this->select('id','fullname','email','address','user_image')->get();
    }
    public function getUser($id){
        return $this->where('id',$id)->first();
    }

}
