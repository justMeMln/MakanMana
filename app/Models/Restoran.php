<?php
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
