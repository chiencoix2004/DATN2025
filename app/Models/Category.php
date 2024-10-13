<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'image_cover',
        'note',
        'parent_id',

    ];

    public $timestamp = false;
    protected $dates = ['deleted_at'];
}
