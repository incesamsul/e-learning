<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriTertulis extends Model
{
    use HasFactory;

    protected $table = 'materi_tertulis';
    protected $guarded = ['id_materi_tertulis'];

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'id_pelajaran', 'id_pelajaran');
    }
}
