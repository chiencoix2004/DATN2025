<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'products_id',
        'users_id',
        'comments',
        'rating',
        'comment_date',
        'status', // Thêm cột status
    ];
}

