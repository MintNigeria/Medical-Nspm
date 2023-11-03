<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }


    public function scopeFilter($query, array $filters)
{
    if ($filters['search'] ?? false) {
        $query->whereHas('patient', function ($subQuery) {
            $subQuery->where('staff_id', 'like', '%' . request('search') . '%');
        });
    }
}
}
