<?php

namespace App\Exports;

use App\Kolam;
use Maatwebsite\Excel\Concerns\FromCollection;

class KolamExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kolam::all();
    }
}
