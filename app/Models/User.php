<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable 

{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email' ,
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'role_user');
    }

    public function hasRole($role) {
        return $this->roles()->where('name', $role)->exists();
    }
}
