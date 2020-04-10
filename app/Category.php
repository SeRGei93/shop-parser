<?php

namespace App;

use App\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40), '-');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    //Polymorphic relation with Articles
    public function articles()
    {
        return $this->morphedByMany('App\Article', 'categoryable');
    }

    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
