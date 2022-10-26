<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminType extends Controller
{
    public function index()
    {
        return view('admin.type',[
            
        ]);
    }
}
