<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Injury extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('staff_id', 'like', '%' . request('search') . '%');
        }
        
        $query->when($filters['start_date'] ?? false, function ($query, $startDate) {
            $query->where('created_at', '>=', $startDate);
        });

        $query->when($filters['end_date'] ?? false, function ($query, $endDate) {
            $query->where('created_at', '<=', $endDate);
        });
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
