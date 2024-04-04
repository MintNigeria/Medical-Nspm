<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class PatientExport implements ToModel
{
    public function model(array $row)
    {
        return new Patient([
            'name' => $row[0],
            'prefix' => $row[1],
            'staff_id' => $row[2],
            'email' => "default@gmail.com",
            'department' => "Medical Services",
            'address' => "190 Samuel Ladoke Akintola Boulevard",
            'contact' => "090 000 00 000",
            'height' => "400",
            'birth_date' => "1912-01-01",
            'location' => 'abj'
        ]);
    }
}