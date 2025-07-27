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
        'wali_kelas',
    ];
}
