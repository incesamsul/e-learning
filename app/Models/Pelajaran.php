<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;

    protected $table = 'pelajaran';
    protected $guarded = ['id_pelajaran'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
