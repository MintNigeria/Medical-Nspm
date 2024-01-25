<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    //
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('staff_id', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship With Records
    public function records()
    {
        return $this->hasMany(Record::class, 'patient_id');
    }

    public function leave()
    {
        return $this->hasMany(Leaves::class, 'patient_id');
    }

    public function allergies()
    {
        return $this->hasMany(Allergy::class, 'patient_id');
    }


    public function dependency()
    {
        return $this->hasMany(Dependent::class, 'patient_id');
    }

    public function injury()
    {
        return $this->hasMany(Injury::class, 'patient_id');
    }
}
