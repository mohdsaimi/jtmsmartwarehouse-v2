<?php

namespace App\Http\Controllers\Backend;

use App\Models\Stoks;
use App\Models\Devices;
use App\Models\Lokasistoks;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stok = Stoks::count();
        $stok_ins = Lokasistoks::where('institut_id',auth()->user()->institut_id)->count();
        $deviceall = Devices::count();
        $device = Devices::where('institut_id',auth()->user()->institut_id)->count();

        return view('backend.dashboard')
            ->with('stok',$stok)
            ->with('stok_ins',$stok_ins)
            ->with('deviceall',$deviceall)
            ->with('device',$device);
    }
}
