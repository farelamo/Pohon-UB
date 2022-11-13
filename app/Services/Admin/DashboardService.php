<?php
namespace App\Services\Admin;

use App\Models\Location;
use App\Models\TreeDetail;

class DashboardService
{

    public function index()
    {
        $countLocation  = Location::all()->count();
        $countTree      = TreeDetail::all()->count();

        return view('admin.dashboard', compact('countLocation', 'countTree'));
    }
}
