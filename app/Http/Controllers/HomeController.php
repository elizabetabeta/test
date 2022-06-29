<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Routing\Controller;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function kontakt()
    {
        return View('kontakt');
    }

    public function welcome()
    {
        $devices = Device::all()->count();
        $devicess = Device::query()->orderBy('created_at', 'DESC')->paginate(5);
        $prodanidevices = Device::all()->where('isSold','!=',  0)->count();
        $dostupnidevices = Device::all()->where('isSold','=',  0)->count();
        $users = User::all()->count();
        $userss = User::query()->orderByDesc('created_at')->paginate(8);

        return View('/welcome', compact('devices','devicess', 'prodanidevices', 'dostupnidevices', 'users', 'userss'));
    }
}
