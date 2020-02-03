<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    public function products()
    {
        // Uma produto pertece a muitas categorias
        return $this->belongsToMany(Product::class);
    }
}
