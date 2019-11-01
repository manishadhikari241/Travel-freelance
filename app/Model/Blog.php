<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=['title','description','featured','popular','author_id','category_id','seo_keyword','seo_description'];

    public function images()
    {
        return $this->hasMany('App\Model\Image','blog_id');
    }
    public function authors()
    {
        return $this->belongsTo('App\Model\Author','author_id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag', 'blog_tags', 'blog_id', 'tag_id');
    }
}
