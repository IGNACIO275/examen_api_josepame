<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';



    protected $fillable = [
        'name',
        'description',
        'companies_idcompany',
    ];

    

    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_idcompany', 'idcompany');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'categories_idcategory', 'idcategory');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'categories_idcategory', 'idcategory');
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


