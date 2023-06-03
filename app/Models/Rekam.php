<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    use HasFactory;

    protected $table = 'rekam';

    protected $fillable = [
        'nama_pasien', 'keluhan', 'tgl', 'nama_dokter'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'nama_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'nama_dokter');
    }
}
