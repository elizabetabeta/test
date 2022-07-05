@extends('layouts.app')

@section('content')
    <div class="container" id="visina">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')
                <br>
                <h2 class="text text-light">Broj oglasa: {{ $devices->count() }}</h2>

            </div>
            <div class = "col-md-9" id="vis">
                <div class="text text-light">
                    <div class ="d-flex align-content-center flex-wrap">
                        <div class = "col">

                    <img src="/storage/{{ $user->profile_image }}" class="rounded-circle" id="flo"
                         style="height: 160px; width: 160px;border: medium solid white">
                        </div>
                        <div class="col">
                            <br>
                        <h2>
                            <i class="fa-solid fa-user"></i>
                             {{ $user->name }}
                        </h2>

                        <h2>
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:{{ $user->email }}" style="text-decoration: none; color: white">
                            {{ Str::limit($user->email, 20, $end='...') }}
                            </a>
                        </h2>

                        <h2>
                            <i class="fa-solid fa-location-dot"></i>
                            @if($user->location == NULL)
                                @if(auth()->user()->id == $user->id)
                                    <a style="text-decoration: none"
                                        href="editprofile{{ $user->id }}">Dodaj lokaciju</a>
                                @else
                                    <small>Korisnik nije dodao lokaciju</small>
                                @endif
                            @else
                                {{ $user->location }}
                            @endif
                        </h2>
                            <small class="text-light">
                                Datum registracije:
                                {{ $user->created_at->format('d.m.Y.') }}
                            </small>
                            </div>
                        </div>
                </div>

                <a href="/comments{{ $user->id }}" class = "btn btn-primary mb-2">
                    Komentari
                </a>
                @if(Auth::user()->id == $user->id)
                    <a href="/editprofile{{ $user->id }}" class = "btn btn-primary mb-2 float-right">
                        Uredi svoj profil
                    </a>
                @endif

                <br>
                <h1 class="text text-light text-center"> Oglasi: </h1>
                    <div class="row">
                @if($devices->count() == 0)
                            <h1 class="text text-light text-center">
                                <br>
                                Ovaj korisnik nema oglasa.
                            </h1>
                @elseif($devices->count() == 1 || $devices->count() == 2)
                    <div class ="row pt-5 d-flex justify-content-center">
                        @foreach($devices as $device)
                            <div class = "col-4 pb-4">
                                <a href="/oglasi{{ $device->id }}">
                                    <img src="/storage/{{ $device->image }}" class = w-100
                                         style="border-radius: 15px;border: medium solid white">
                                </a>
                            </div>
                        @endforeach
                @else
                    <div class ="row pt-5">
                        @foreach($devices as $device)
                            <div class = "col-4 pb-4">
                                <a href="/oglasi{{ $device->id }}">
                                    <img src="/storage/{{ $device->image }}" class = w-100
                                         style="border-radius: 15px;border: medium solid white">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
                    </div>

            </div>
        </div>
        <br><br>
    </div>
    </div>
@endsection

<style>
    #visina {
        min-height: 100%;
    }

    @media only screen and (min-width: 750px) {
        #flo{
            float: right;
        }

    }


</style>
