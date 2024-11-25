<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin'; // Nama tabel
    protected $primaryKey = 'username'; // Primary key
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password', // Menyembunyikan password
    ];

    // Encrypt password secara otomatis
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = md5($value);
    }
}
