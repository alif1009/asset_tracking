<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi melalui mass assignment.
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * Atribut yang harus disembunyikan untuk serialisasi (JSON/Array).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}