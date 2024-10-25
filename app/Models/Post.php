<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    protected $fillable = [
    'name',
    'text',
    ];

    // protected function casts(): array
    // {
    //     return [
    //     ]
    // }
}
