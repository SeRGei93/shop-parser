<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'published',
        'created_by',
        'modified_by'
    ];

    //Mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = \Str::slug( mb_substr($this->title, 0, 40), '-');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
