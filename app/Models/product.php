<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // Agregamos los campos fillable para que filter y sort funcionen
    protected $fillable = [
        'name',
        'price',
        'description',
        'categories_idcategory',
        'companies_idcompany'
    ];

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
        return $this->hasMany(Cart::class, 'products_idproduct');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'products_idproduct');
    }

    // Scope para incluir relaciones
    public function scopeInclude($query, $includes)
    {
        if (!$includes) return $query;

        $relations = explode(',', $includes);
        return $query->with($relations);
    }

    // Scope para filtrar
    public function scopeFilter($query, $filters)
    {
        if (!$filters) return $query;

        foreach ($filters as $field => $value) {
            if (in_array($field, $this->fillable)) {
                $query->where($field, 'LIKE', "%$value%");
            }
        }

        return $query;
    }

    // Scope para ordenar
    public function scopeSort($query, $sort)
    {
        if (!$sort) return $query;

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
