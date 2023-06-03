<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'nama_pasien', 'jk', 'tgl_lahir', 'alamat', 'no_hp'
    ];

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class);
    }

    public function rekam()
    {
        return $this->hasMany(Rekam::class);
    }
}
