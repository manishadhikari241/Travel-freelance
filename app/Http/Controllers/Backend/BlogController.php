<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends BackendController
{
    public function blogs(Request $request)
    {
        if ($request->isMethod('get'))
        {
            return view($this->backendpagepath.'blogs');
        }
    }
}
