<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'ruc',          
        'description'
    ];
    protected $table = 'companies';
    

    public function user()
    {
        return $this->belongsTo(User::class, 'users_iduser');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'companies_idcompany');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'companies_idcompany');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'companies_idcompany');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'companies_idcompany');
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





