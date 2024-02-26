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
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('patient.name', 'like', '%' . $search . '%');
        });

        $query->when($filters['start_date'] ?? false, function ($query, $startDate) {
            $query->where('created_at', '>=', $startDate);
        });

        $query->when($filters['end_date'] ?? false, function ($query, $endDate) {
            $query->where('created_at', '<=', $endDate);
        });
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

    public function feedback()
    {
        return $this->hasMany(Feedbacks::class, 'record_id');
    }

    public function management()
    {
        return $this->hasMany(Management::class, 'record_id');
    }

    public function receipt()
    {
        return $this->hasMany(Receipt::class, 'record_id');
    }
}
