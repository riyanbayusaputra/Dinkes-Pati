<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DataImport implements ToArray, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function array(array $array)
    {
        return $array;
    }

    public function startRow(): int
    {
        return 3;
    }
}
