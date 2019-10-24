<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['name'];

    public function blogs()
    {
        return $this->belongsToMany('App\Model\Blog', 'blog_tags', 'tag_id', 'blog_id');
    }
}
