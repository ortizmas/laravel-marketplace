<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasSlug;

    protected $table = 'stores';

    protected $fillable = [
        'name', 'slug', 'description', 'phone', 'mobil_phone', 'logo'
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

    public function orders()
    {
        return $this->hasMany(UserOrder::class);
    }
}
