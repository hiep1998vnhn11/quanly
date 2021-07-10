<?php

namespace App\Imports;

use App\Models\Part;
use Maatwebsite\Excel\Concerns\ToModel;

class PartsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Part([
            'code' => $row[0],
            'description' => $row[1],
            'alias' => $row[2],
            'name' => $row[3],
            'category' => $row[4],
            'unit' => $row[5] ?? 0,
            'import_price' => $row[6] ?? 0,
            'retail_price' => $row[7] ?? 0,
            'sale_price' => $row[8] ?? 0,
            'DVT' => intval($row[9]),
        ]);
    }
}
