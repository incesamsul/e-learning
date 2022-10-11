<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriVideo extends Model
{
    use HasFactory;

    protected $table = 'materi_video';
    protected $guarded = ['id_materi_video'];

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'id_pelajaran', 'id_pelajaran');
    }
}
