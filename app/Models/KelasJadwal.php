<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasJadwal extends Model
{
    use HasFactory;

    protected $table = 'kelas_jadwal';

    protected $fillable = [
        'kelas',
        'hari',
        'jam',
        'guru_id', // ganti wali_kelas jadi guru_id
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
