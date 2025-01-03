<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (Mahasiswa::where('nim', $row[0])->exists()) {
            return null; // Jangan impor jika NIM sudah ada
        }

        return new Mahasiswa([
            'nim' => $row[0],
            'nama' => $row[1],
            'password' => Hash::make($row[0]),
            'tempat_lahir' => $row[2],
            'kelamin' => $row[3],
            'tanggal_lahir' => Carbon::createFromFormat('d/m/Y', $row[4])->format('Y-m-d'),
            'prodi' => $row[5],
        ]);
    }
}
