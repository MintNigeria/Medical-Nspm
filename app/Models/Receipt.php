<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('staff_id', 'like', '%' . request('search') . '%');
        }
    }

    public function record()
    {
        return $this->belongsTo(Record::class, 'record_id');
    }
}
