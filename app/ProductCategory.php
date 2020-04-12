<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'published',
        'image',
        'description',
        'created_by',
        'modified_by'
    ];

    // Mutator
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40), '-');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }



}
