<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        'company_id',
    ];
    protected $table = 'services';

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_idcategory');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_idcompany');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'services_idservice');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'services_idservice');
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





