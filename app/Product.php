<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasSlug;

    protected $table = 'products';

    protected $fillable = [
        'name', 'slug', 'description', 'body', 'price'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

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

    public function photos()
    {
        // Ese produto têm varias images
        return $this->hasMany(ProductPhoto::class);
    }
}
