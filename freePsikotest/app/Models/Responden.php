<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    protected $table = 'responden';
    protected $primaryKey = 'id_responden';
    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap', 'jenis_kelamin', 'email', 'tempat_tanggal_lahir', 'tanggal_ujian'
    ];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'id_responden');
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'id_responden');
    }
}