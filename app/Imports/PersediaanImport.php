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
        return new Persediaan([
            'nama' => $row[0],
            'stok' => $row[1],
            'lokasi' => $row[2],
            'jenis' => $row[3],
        ]);
    }
}
