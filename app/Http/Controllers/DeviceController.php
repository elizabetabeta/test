<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;


class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //dohvacanje svih modela tog tipa npr. /devices
    public function index(){
        //$devices = DB::select('select * from devices order by created_at desc ');
        $devices = Device::query()->orderBy('created_at', 'DESC');

        $devices = $devices->get();
        return view('oglasi',['devices'=>$devices]);
    }

    public function index2(){
        //$devices = DB::select('select * from devices order by created_at desc ');
        $devices = Device::query()->orderBy('created_at', 'DESC');
        if (auth()->user()->role !== 'Admin') {
            $devices->where('user_id', auth()->id());
        }
        $devices = $devices->get();
        return view('mojioglasi',['devices'=>$devices]);

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
    public function store()
    {

            $data = request()->validate([
                'tip' => 'required',
                'naziv' => 'required',
                'sistem' => 'required',
                'godina_izdanja' => 'required',
                'boja' => 'required',
                'velicina' => 'required',
                'kapacitet_baterije' => 'required',
                'memorija' => 'required',
                'RAM' => 'required',
                'kontakt' => 'required',
                'cijena' => 'required',
                'opis' => 'required',
                'image' => ['required','image'],
            ]);

            $imagePath = (request('image')->store('uploads', 'public'));

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();

            auth()->user()->devices()->create([
                'tip' => $data['tip'],
                'naziv' => $data['naziv'],
                'sistem' => $data['sistem'],
                'godina_izdanja' => $data['godina_izdanja'],
                'boja' => $data['boja'],
                'velicina' => $data['velicina'],
                'kapacitet_baterije' => $data['kapacitet_baterije'],
                'memorija' => $data['memorija'],
                'RAM' => $data['RAM'],
                'kontakt' => $data['kontakt'],
                'cijena' => $data['cijena'],
                'opis' => $data['opis'],
                'image' => $imagePath,

        ]);

            return redirect("/oglasi")->with('success','Uspješno ste dodali oglas.');

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
        return view('devices.show',
            compact('device')
        );
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
            'naziv'=>$request->naziv,
            'sistem'=>$request->sistem,
            'godina_izdanja'=>$request->godina_izdanja,
            'boja'=>$request->boja,
            'velicina'=>$request->velicina,
            'kapacitet_baterije'=>$request->kapacitet_baterije,
            'memorija'=>$request->memorija,
            'RAM'=>$request->RAM,
            'user_id'=>$request->user_id,
            'cijena'=>$request->cijena,
            'opis' => $request->opis,

        ]);

        return redirect("/oglasi")->with('success','Uspješno ste uredili oglas.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $device = Device::find($id);

        if(auth()->user()->id !== $device->user_id && auth()->user()->role !== 'Admin' && auth()->user()->role !== 'Moderator' && !(Gate::allows('delete-posts'))){
            abort('403', "Niste vlasnik oglasa ili admin/moderator!");
        }

        DB::table('devices')->where("id", $id)->delete();
        return redirect('/oglasi')->with('success', 'Uspješno ste obrisali oglas');
    }

    public function delete2($id)
    {
        $device = Device::find($id);

        if(auth()->user()->id !== $device->user_id && auth()->user()->role !== 'Admin' && auth()->user()->role !== 'Moderator' && !(Gate::allows('delete-posts'))){
            abort('403', "Niste vlasnik oglasa ili admin/moderator!");
        }

        DB::table('devices')->where("id", $id)->delete();
        return redirect('/mojioglasi')->with('success', 'Uspješno ste obrisali oglas');
    }


}
