<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use App\Models\Sysslds;
use App\Models\Lokasistoks;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SyssldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /* $syssld = Sysslds::where('institut_id',auth()->user()->institut_id);

        return view('backend.syssld', compact('syssld'))
            /* ->with($syssld) ; */

        $syssld = Sysslds::where('institut_id',auth()->user()->institut_id)
            ->whereDate('created_at', Carbon::today())
            /* ->latest() */
            ->orderBy('pengguna','ASC')->paginate(5);

        return view('backend.syssld', compact('syssld'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lokasistoks $lokasistok)
    {
        //
        return view('backend.createsyssld')
        /* ->withDevices(Devices::all()) */
        ->withDevices(Devices::where('institut_id',auth()->user()->institut_id)->get())
        ->withLokasistok($lokasistok);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sysslds  $syssld
     * @return \Illuminate\Http\Response
     */
    public function show(Sysslds $syssld)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sysslds  $syssld
     * @return \Illuminate\Http\Response
     */
    public function edit(Sysslds $syssld)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sysslds  $syssld
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sysslds $syssld)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sysslds  $syssld
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sysslds $syssld)
    {
        //
    }
}
