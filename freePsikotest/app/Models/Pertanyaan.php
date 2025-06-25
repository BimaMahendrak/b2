<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
    public $timestamps = false;

    protected $fillable = ['id_kategori', 'pertanyaan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_pertanyaan');
    }
	
	public function pertanyaan()
	{
		return $this->belongsTo(\App\Models\Pertanyaan::class, 'id_pertanyaan');
	}
}