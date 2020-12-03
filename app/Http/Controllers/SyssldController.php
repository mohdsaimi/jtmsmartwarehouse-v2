<?php

namespace App\Http\Controllers;

use App\Models\Stoks;
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
        $syssld = Sysslds::where('institut_id',auth()->user()->institut_id)
            ->whereDate('created_at', Carbon::today())
            /* ->latest() */
            ->orderBy('pengguna','ASC')->paginate(25);

        return view('backend.syssld', compact('syssld'))
            ->with('i', (request()->input('page', 1) - 1) * 25);


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
        if($this->check_stok_ins($request->device_id) > 0){
            //do noting
        }else{
            return redirect()->back()->withFlashDanger(__('Stok tiada di institut!'));
        }

        if($this->check_stok_pengguna($request->device_id,$request->pengguna) > 0){
            return redirect()->back()->withFlashDanger(__('Stok telah wujud'));
        }

        $syssld = new Sysslds();
        $syssld->pengguna = $request->pengguna;
        $syssld->stok_id = $request->stok_id;
        $syssld->device_id = $request->device_id;
        $syssld->petak = $request->petak;
        $syssld->kuantiti = $request->kuantiti;
        $syssld->institut_id = auth()->user()->institut_id;

        if($syssld->save()){
            return redirect()->route('admin.syssld')
            ->withFlashSuccess(__('SLDS telah berjaya disimpan.'));
        }
        else{
            return redirect()->back()->withFlashDanger(__('SLDS gagal disimpan'));
        }
    }

    public function check_stok_pengguna($device_id,$pengguna){
        return Sysslds::where('device_id',$device_id)
            ->where('pengguna',$pengguna)
            ->where('created_at',today())
            ->count();
    }

    public function check_stok_ins($device_id){
        return Lokasistoks::where('device_id',$device_id)
            ->where('institut_id',auth()->user()->institut_id)
            ->count();
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
        return view('backend.editsyssld')
            ->withSyssld($syssld);
            /* ->withDevice(Devices::where('institut_id',auth()->user()->institut_id)->get())
            ->withLokasistok(Lokasistoks::all())
            ->withStok(Stoks::all()); */
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
        $updateData = $request->validate([
            'pengguna' => 'required',
            'kuantiti' => 'required'
        ]);

       /*  return $request->pengguna; */

        Sysslds::whereId($syssld->id)->update($updateData);

        return redirect()->route('admin.syssld')->withFlashSuccess(__('SLDS berjaya dikemaskini.'));

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
        $syssld->delete();

        return redirect()->route('admin.syssld')->withFlashSuccess(__('SLDS berjaya dipadam.'));
    }
}
