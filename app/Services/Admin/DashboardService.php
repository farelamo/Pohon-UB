<?php
namespace App\Services\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\TreeDetail;
use App\Models\Location;
use App\Models\TreeType;
use App\Models\Cluster;

class DashboardService
{

    public function index()
    {
        $countLocation  = Location::all()->count();
        $countTree      = TreeDetail::all()->count();
        $countCluster   = Cluster::all()->count();
        $countType      = TreeType::all()->count();

        $grafikData     = DB::table('tree_details')
                            ->select('year', DB::raw('count(*) as total'))
                            ->groupBy('year')
                            ->pluck('total','year')
                            ->toArray();
                            
        return view('admin.dashboard', compact('countLocation', 'countTree', 'countCluster', 'countType', 'grafikData'));
    }
}
