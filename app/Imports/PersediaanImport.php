<?php

namespace App\Imports;

use App\Models\Persediaan;
use Maatwebsite\Excel\Concerns\ToModel;

class PersediaanImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return Persediaan::updateOrCreate(
            [
                'nama' => $row[0],
            ],
            [
                'stok' => $row[1],
                'satuan' => $row[2],
                'lokasi' => $row[3],
                'jenis' => $row[4]
            ]
        );
    }
}
