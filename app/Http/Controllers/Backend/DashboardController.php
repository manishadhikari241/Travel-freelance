<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends BackendController
{
    public function index(Request $request)
    {
        return view($this->backendpagepath.'dashboard');
    }
}
