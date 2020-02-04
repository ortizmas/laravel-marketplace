<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = [
        'name', 'slug', 'description', 'phone', 'mobil_phone'
    ];

    public function user()
    {
        // Um loja pertece a um usuario
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        // Uma loja têm muitos produtos
        return $this->hasMany(Product::class);
    }
}
