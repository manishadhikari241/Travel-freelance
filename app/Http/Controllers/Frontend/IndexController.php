<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Blog;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $cat = Category::all();
        $this->data('category', $cat);
        return view('Frontend.index', $this->data);
    }

    public function blogs($id)
    {
        $page = Blog::where('id', '=', $id)->first();
        $this->data('blog', $page);
        return view('Frontend.pages.blog_single');
    }

    public function blogscategory(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('Frontend.pages.destination');

        }
        return false;
    }
}
