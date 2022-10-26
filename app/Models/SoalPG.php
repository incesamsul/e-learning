<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalPG extends Model
{
    use HasFactory;

    protected $table = 'soal_pg';
    protected $guarded = ['id_soal_pg'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'id_quiz', 'id_quiz');
    }
}
