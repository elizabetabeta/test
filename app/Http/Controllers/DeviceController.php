<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceType;
use App\Models\User;
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
        $devices = Device::with('type')->orderBy('created_at', 'DESC')->paginate(5);
        $type = DeviceType::all();
        $number = Device::all()->count();

        return view('oglasi.oglasi',['devices'=>$devices], compact('type', 'number'));
    }

    public function dostupni(Device $device){
        //$devices = DB::select('select * from devices order by created_at desc ');
        $devices = Device::with('type')->where('isSold','=',  0)->orderBy('created_at', 'DESC')->paginate(5);
        $type = DeviceType::all();
        $number = Device::all()->where('isSold', '=', 0)->count();

        return view('oglasi.dostupni',['devices'=>$devices], compact('type', 'number'));
    }

    public function prodani(){
        //$devices = DB::select('select * from devices order by created_at desc ');
        $devices = Device::with('type')->where('isSold','!=',  0)->orderBy('created_at', 'DESC')->paginate(5);
        $type = DeviceType::all();
        $number = Device::all()->where('isSold', '!=', 0)->count();

        return view('oglasi.prodani',['devices'=>$devices], compact('type', 'number'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $devices = Device::query()
            ->with('type')
            ->where('naziv', 'LIKE', "%{$search}%")
            ->orWhere('sistem', 'LIKE', "%{$search}%")
            ->orWhereBetween('cijena', [ 1, $search ])
            ->orderByDesc('created_at')
            ->get();

        $number = $devices->count();

        return view('oglasi.search', compact('devices', 'search', 'number'));
    }

    public function mojioglasi(){
        //$devices = DB::select('select * from devices order by created_at desc ');
        if(auth()->user()->role == "Admin"){
            abort('403', 'Admin može samo uređivati oglase, ne dodavati i svoje.');
        }
        $devices = Device::query()->where('user_id', '=', auth()->user()->id)->
        with('type')->orderBy('created_at', 'DESC')->paginate(6);

        $type = DeviceType::all();


        $number = Device::query()->where('user_id', '=', auth()->user()->id)->count();

        return view('oglasi.mojioglasi',['devices'=>$devices], compact('type', 'number'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
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
                'device_type_id' => 'required',
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
                'location' => 'required',
                'image' => ['required','image'],
            ]);

            $imagePath = (request('image')->store('uploads', 'public'));

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();

            Device::create([
                'device_type_id' => $data['device_type_id'],
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
                'location' => $data['location'],
                'user_id' => auth()->id(),
                'image' => $imagePath,

        ]);

            return redirect("/mojioglasi")->with('success','Uspješno ste dodali oglas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    // Dohvacanje pojedinacnog uredjaja
    public function show(Device $device)
    {
        $user = User::all()->where('id', '=', $device->user_id );
        $type = DeviceType::all();

        return view('oglasi.showoglas',
            compact('device', 'user', 'type')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $type = DeviceType::all();

        if(auth()->user()->id !==$device->user_id && auth()->user()->role !== 'Admin' && auth()->user()->role !== 'Moderator' && !(Gate::allows('delete-posts'))){
            return abort('403', "Niste vlasnik oglasa ili admin/moderator!");
        }
        return view('oglasi.editoglas',
            compact('device', 'type')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $device = Device::find($id);
        $device->device_type_id= $request->input('device_type_id');
        $device->naziv= $request->input('naziv');
        $device->sistem= $request->input('sistem');
        $device->godina_izdanja= $request->input('godina_izdanja');
        $device->boja= $request->input('boja');
        $device->velicina= $request->input('velicina');
        $device->kapacitet_baterije= $request->input('kapacitet_baterije');
        $device->memorija= $request->input('memorija');
        $device->RAM= $request->input('RAM');
        $device->kontakt= $request->input('kontakt');
        $device->location= $request->input('location');
        $device->cijena= $request->input('cijena');
        $device->opis= $request->input('opis');


        if($request->hasFile('image')){
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();

            $device->image = $imagePath;

        }

        $device->update();


        return redirect("/oglasi{$device->id}")->with('success','Uspješno ste uredili oglas.');
    }


        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\Device $device
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
         */
        public function delete($id)
        {
            $device = Device::find($id);

            if (auth()->user()->id !== $device->user_id && auth()->user()->role !== 'Admin' && auth()->user()->role !== 'Moderator' && !(Gate::allows('delete-posts'))) {
                abort('403', "Niste vlasnik oglasa ili admin/moderator!");
            }

            DB::table('devices')->where("id", $id)->delete();
            return redirect('/oglasi')->with('success', 'Uspješno ste obrisali oglas');
        }

        public function delete2($id)
        {
            $device = Device::find($id);

            if (auth()->user()->id !== $device->user_id && auth()->user()->role !== 'Admin' && auth()->user()->role !== 'Moderator' && !(Gate::allows('delete-posts'))) {
                abort('403', "Niste vlasnik oglasa ili admin/moderator!");
            }

            DB::table('devices')->where("id", $id)->delete();
            return redirect('/mojioglasi')->with('success', 'Uspješno ste obrisali oglas');
        }


        public function changeIsSold($id)
        {
            /*$this->validate($request, [
                'isSold' => 'required'
            ]);*/
            $device = Device::find($id);
            $device->isSold = 1;
            $device->save();

            /*if (auth()->user()->id !== $device->user_id && auth()->user()->role !== 'Admin' && auth()->user()->role !== 'Moderator' && !(Gate::allows('delete-posts'))) {
                abort('403', "Niste vlasnik oglasa ili admin/moderator!");
            }*/
            return redirect('/mojioglasi')->with('success', 'Uspješno ste prodali uredjaj.');
        }
}
