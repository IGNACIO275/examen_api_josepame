<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_iduser');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_idproduct');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'services_idservice');
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





