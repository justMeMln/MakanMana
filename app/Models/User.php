<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user'; // Nama tabel
    protected $primaryKey = 'username'; // Primary key
    public $incrementing = false; // Karena primary key bukan integer
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'nama_lengkap',
        'preferensi_menu',
    ];

    protected $hidden = [
        'password', // Menyembunyikan password dalam serialisasi JSON
    ];

    // Encrypt password secara otomatis
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = md5($value);
    }
}
