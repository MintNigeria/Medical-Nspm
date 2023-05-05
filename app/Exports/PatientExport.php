<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatientExport implements Exportable
{
    use Exportable;

    public function query()
    {
        return Patient::query();
    }
}