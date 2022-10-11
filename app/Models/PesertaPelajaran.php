<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaPelajaran extends Model
{
    use HasFactory;

    protected $table = 'peserta_pelajaran';
    protected $guarded = ['id_peserta_pelajaran'];

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'id_pelajaran', 'id_pelajaran');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa', 'id');
    }
}
