<?php
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Restoran extends Model
// {
//     use HasFactory;

//     protected $table = 'restoran'; // Nama tabel
//     protected $primaryKey = 'id_restoran'; // Primary key
//     public $timestamps = false;

//     protected $fillable = [
//         'nama_restoran',
//         'alamat', // Alamat gabungan yang disimpan dalam format JSON atau string
//     ];

//     // Relasi ke tabel Menu
//     public function menu()
//     {
//         return $this->hasMany(Menu::class, 'id_restoran');
//     }
// }
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;

    protected $table = 'restoran';
    protected $primaryKey = 'id_restoran';
    public $timestamps = false;

    protected $fillable = ['nama_restoran', 'alamat'];

    // Relasi: Restoran memiliki banyak Menu
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_restoran', 'id_restoran');
    }
}
