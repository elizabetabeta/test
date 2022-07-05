<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Intervention\Image\Facades\Image;
use function Sodium\compare;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = DB::table('users')->orderByDesc('id')->paginate(10);

        return view('korisnici.users', ["users"=>$user]);
    }

    public function svikorisnici()
    {
        $user = DB::table('users')->orderBy('name')->paginate(12);

        return view('korisnici.svikorisnici', ["users"=>$user]);
    }

    public function profile(User $user)
    {
        $devices = Device::all()->where('user_id', '=', $user->id )->sortByDesc('created_at');
        return view('korisnici.profil', compact('user', 'devices'));
    }

    public function userdelete(User $user)
    {
        return view("korisnici.showdelete", compact('user'));
    }

    public function deleteprofil($id)
    {
        DB::table('users')->where("id", $id)->delete();
        DB::table('devices')->where('user_id', $id)->delete();

        return redirect('/');
    }

    public function deleteuser($id)
    {
        DB::table('users')->where("id", $id)->delete();
        DB::table('devices')->where('user_id', $id)->delete();

        return redirect('/users')->with('success', 'Uspješno ste obrisali korisnika.');
    }

    public function search(Request $request)
    {
        if (auth()->user()->role != "Admin"){
            abort('403', 'Samo admin ima pristup ovom dijelu sustava.');
        }
        $search = $request->input('search');

        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orderByDesc('id')
            ->get();

        return view('korisnici.search', compact('users', 'search'));
    }

    public function searchprofile(Request $request)
    {
        $search2 = $request->input('search2');

        $users = User::query()
            ->where('name', 'LIKE', "%{$search2}%")
            ->orWhere('email', 'LIKE', "%{$search2}%")
            ->orderBy('name')
            ->get();

        return view('korisnici.searchprofile', compact('users', 'search2'));
    }

    public function add(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect('/users')->withErrors($validator)->withInput();
        } else {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            return redirect("/users")->with('success','Uspješno ste dodali novog korisnika.');
        }
    }

    public function edit(User $user)
    {
        if(auth()->user()->id !== $user->id){
            return abort('403', "Niste vlasnik profila!");
        }
        return view("korisnici.profiledit", compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->location = $request->input('location');


        if (request()->hasFile('profile_image')) {
            $imagePath = request('profile_image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $user->profile_image = $imagePath;

        }

        $user->update();

        return redirect("/profile{$user->id}")->with('success', 'Uspješno ste uredili svoje informacije.');

    }

    public function editrole(User $user)
    {
        if(auth()->user()->role != "Admin"){
            return abort('403', "Niste Admin!");
        }
        return view("korisnici.rolechange", compact('user'));
    }

    public function changerole(Request $request, $id)
    {

        $user = User::find($id);

        $user->role = $request->input('role');

        if($user->role == 'Admin'){
            $dev = Device::query()->where('user_id','=', $user->id);
            $dev->delete();
        }

        $user->update();

        return redirect("/users")->with('success', 'Uspješno ste promijenili ulogu korisnika.');

    }

}
