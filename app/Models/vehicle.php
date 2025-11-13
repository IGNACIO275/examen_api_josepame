<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    public function deliverie()
    {
        return $this->belongsTo(Deliverie::class, 'deliveries_iddelivery');
    }
    public function scopeInclude($query, $includes)
    {
        if (!$includes) {
            return $query;
        }

    
        $relations = explode(',', $includes);

        return $query->with($relations);
    }

    
    public function scopeFilter($query, $filters)
    {
        if (!$filters) {
            return $query;
        }

        foreach ($filters as $field => $value) {
            if (in_array($field, $this->fillable)) {
                $query->where($field, 'LIKE', "%$value%");
            }
        }

        return $query;
    }

    
    public function scopeSort($query, $sort)
    {
        if (!$sort) {
            return $query;
        }

        
        $direction = 'asc';
        if (str_starts_with($sort, '-')) {
            $direction = 'desc';
            $sort = ltrim($sort, '-');
        }

        if (in_array($sort, $this->fillable)) {
            return $query->orderBy($sort, $direction);
        }

        return $query;
    }
}





