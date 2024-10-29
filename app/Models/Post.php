<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'text',
        'user_id',
    ];


    // se usa en el ORM para indicar que cada post pertenece a un usuario MODELO CHAPERONE
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
