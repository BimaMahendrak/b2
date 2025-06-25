<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id_feedback';
    public $timestamps = false;

    protected $fillable = ['id_responden', 'rating', 'ulasan'];

    public function responden()
    {
        return $this->belongsTo(Responden::class, 'id_responden');
    }
}