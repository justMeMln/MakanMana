<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu'; // Nama tabel
    protected $primaryKey = 'id_menu'; // Primary key
    public $timestamps = false; // Nonaktifkan timestamps jika tabel tidak memiliki kolom `created_at` dan `updated_at`

    protected $fillable = [
        'nama_menu',
        'harga_menu',
        'kategori_menu',
        'url_gambar_menu',
        'id_restoran',
    ];

    // Relasi ke tabel Restoran
    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'id_restoran');
    }
}
