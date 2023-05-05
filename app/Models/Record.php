<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where(
                'patient.name',
                'like',
                '%' . request('search') . '%'
            );
        }
    }

    // public function scopeFilter($query, $staff_id)
    // {
    //     return $query->whereHas('patient', function ($q) use ($staff_id) {
    //         $q->where('staff_id', 'like', '%' . $staff_id . '%');
    //         // ->orWhere('last_name', 'like', '%' . $name . '%');
    //     });
    // }

    // Relationship With Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function receipt()
    {
        return $this->hasMany(Receipt::class, 'record_id');
    }
}