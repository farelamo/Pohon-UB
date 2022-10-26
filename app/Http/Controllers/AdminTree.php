<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTree extends Controller
{
    public function index()
    {
        return view('admin.tree',[
            
        ]);
    }
}
