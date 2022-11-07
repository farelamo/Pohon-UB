<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuth extends Controller
{
    public function index()
    {
        return view('admin.login',[
            
        ]);
    }

    public function login()
    {
        return redirect('/dev/');
    }
}
