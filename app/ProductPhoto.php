<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
        'image',
    ];

    public function product()
    {
        // Esa imagem pertece a um produto
        return $this->belongsTo(Product::class);
    }
}
