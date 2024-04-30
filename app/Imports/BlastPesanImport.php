<?php

namespace App\Imports;

use App\Models\BlastPesan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlastPesanImport implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {

        return new BlastPesan([
            'telepon' => $row[0],
            'pesan' => $row[1],
            "tanggal" => date("Y-m-d")
        ]);
    }
}
