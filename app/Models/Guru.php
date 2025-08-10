<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nip', 'mapel', 'no_hp', 'foto'];

    public function kelasJadwal()
    {
        return $this->hasMany(KelasJadwal::class, 'guru_id');
    }
}

