<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Laboratorium extends Model
{
    protected $table = 'laboratoriums';
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
    ];
}
