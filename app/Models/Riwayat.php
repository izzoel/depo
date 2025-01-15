<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_persediaan',
        'id_mahasiswa',
        'ambil',
        'kembali',
        'tanggal',
        'keperluan',
    ];

    public function persediaan()
    {
        return $this->belongsTo(Persediaan::class, 'id_persediaan');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
