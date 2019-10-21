<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $cat=Category::all();
        $this->data('category',$cat);
        return view('Frontend.index',$this->data);
    }
}
