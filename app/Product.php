<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description_short',
        'description',
        'image',
        'price',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'published',
        'created_by',
        'modified_by'
    ];

    // Mutator
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 80), '-');
    }

    // Polymorphic relation with ProductCategories

    public function categories()
    {
        return $this->belongsToMany('App\ProductCategory');
    }

}
