<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //dohvacanje svih modela tog tipa npr. /devices
    public function index()
    {
        return Device::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create()
    {
        // ovo je za frontend
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //kreiranje modela, POST na /devices
    public function store(Request $request)
    {
        $device = Device::create([
            'tip'=>$request->tip,
            'sistem'=>$request->sistem,
            'godina_izdanja'=>$request->godina_izdanja,
            'boja'=>$request->boja,
            'velicina'=>$request->velicina,
            'kapacitet_baterije'=>$request->kapacitet_baterije,
            'memorija'=>$request->memorija,
            'RAM'=>$request->RAM,
            'user_id'=>$request->user_id
        ]);

        return $device;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    // Dohvacanje pojedinacnog uredjaja
    public function show(Device $device)
    {
        return $device;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    /* public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $device->update([
            'tip'=>$request->tip,
            'sistem'=>$request->sistem,
            'godina_izdanja'=>$request->godina_izdanja,
            'boja'=>$request->boja,
            'velicina'=>$request->velicina,
            'kapacitet_baterije'=>$request->kapacitet_baterije,
            'memorija'=>$request->memorija,
            'RAM'=>$request->RAM,
            'user_id'=>$request->user_id
        ]);

        return $device;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        return $device->delete();
    }
}
