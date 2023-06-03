<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugass';

    protected $fillable = [
        'nama_petugas', 'jabatan', 'jk', 'no_hp', 'username', 'password'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan');
    }
}
