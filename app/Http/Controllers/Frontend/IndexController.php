<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Author;
use App\Model\Blog;
use App\Model\Category;
use App\Model\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $cat=Category::all();
        $this->data('category',$cat);
        return view('Frontend.index',$this->data);
    }

    public function blogs($id)
    {
        $page=Blog::where('id','=',$id)->first();
        $this->data('blog',$page);
        $author=Author::all();
        $this->data('author',$author);
        $cat=Category::all();
        $this->data('category',$cat);
        $tag=Tag::all();
        $this->data('tags',$tag);
        return view('Frontend.pages.blog_single',$this->data);
    }
}
