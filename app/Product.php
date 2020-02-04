<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'slug', 'description', 'body', 'price'
    ];

    public function store()
    {
        // Um produto pertece a uma loja
        return $this->belongsTo(store::class);
    }

    public function categories()
    {
        // Uma categoria pertece a muitos produtos
        return $this->belongsToMany(Category::class);
    }
}
