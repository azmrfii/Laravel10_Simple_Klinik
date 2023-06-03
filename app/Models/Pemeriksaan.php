<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';

    protected $fillable = [
        'nama_pasien', 'klinik', 'nama_dokter', 'tgl', 'hasil_penguji', 'biaya'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'nama_pasien');
    }

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'klinik');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'nama_dokter');
    }
}
