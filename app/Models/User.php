<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user'; // Nama tabel sesuai dengan SQL
    protected $primaryKey = 'id_user'; // Primary key
    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
