<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id_jawaban';
    public $timestamps = false;

    protected $fillable = ['id_pertanyaan', 'id_responden', 'jawaban'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }

    public function responden()
    {
        return $this->belongsTo(Responden::class, 'id_responden');
    }
}