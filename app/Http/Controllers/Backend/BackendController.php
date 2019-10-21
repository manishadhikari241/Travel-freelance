<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    protected $backendpagepath = 'Backend.pages.';
    protected $backendblogpath = 'Backend.pages.blog.';

    public function __construct()
    {
        $this->backendpagepath;
        $this->backendblogpath;
    }


}
