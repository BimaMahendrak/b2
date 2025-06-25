<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    protected $fillable = ['nama_kategori'];

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'id_kategori');
    }
}