<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'message',
        'is_read',
        'read_at',
        'created_at',
    ];
}
