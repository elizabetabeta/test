@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')

            </div>
            <div class="col-md-9" id="visina">
                <div class="card" id="prozirno">
                    <div class="card-header">Vaši oglasi</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif

                        <!--<i class="fa-solid fa-mobile-screen-button"></i>-->
                        <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#exampleModalCenter2">
                            Dodaj novi oglas
                        </button>
                            <br><br><br>
                            @if($number == 0)
                                <h1 class="text text-primary text-center">Niste dodali ni jedan oglas! Dodajte sada!</h1>
                                    <img src="lapitopi.png" style=" display: block; margin-left: auto;margin-right: auto; width: 50%;">
                                <br><br>
                                @else

                            @foreach($devices as $device)
                                @if(auth()->user()->id == $device->user_id)

                                    <div class="card mb-3" id="oglasikartice">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <a href="/oglasi/{{ $device->id }}">
                                                    <img style="border-radius: 25px"
                                                        src="/storage/{{ $device->image }}" class="img-fluid rounded-start pb-2 ps-2" alt="Nema slike...">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <a href="/oglasi/{{ $device->id }}" style="text-decoration: none">
                                                    <h5 class="card-title">{{ $device->naziv }}</h5>
                                                    </a>
                                                        <hr>
                                                    <h5 class="card-text">{{ $device->type->naziv }}</h5>
                                                    <p class="card-text">{{ $device->opis }}</p>
                                                    <p class="card-text">{{ $device->cijena }} KM</p>
                                                    @if( $device->isSold === 0 )
                                                        <h4 class="text text-success">
                                                            <i class="fa-solid fa-circle-check"></i>
                                                            Dostupno
                                                        </h4>
                                                    @else
                                                        <h4 class="text text-danger">
                                                            <i class="fa-solid fa-circle-xmark"></i>
                                                            Prodano
                                                        </h4>
                                                    @endif
                                                    <br>
                                                    <a href="/oglasi/{{ $device->id }}">
                                                        <p class="card-text"><small class="text-muted">
                                                                Više...
                                                            </small></p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                        @endif
                        {{$devices->links('pagination::bootstrap-4')}}


                        <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                                <form method="POST" action="/oglas" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-primary" id="exampleModalLongTitle">Dodavanje oglasa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Zatvori">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="device_type_id">Tip uređaja</label>
                                                    <select
                                                        class="form-control" name="device_type_id" id="device_type_id">
                                                        @foreach($type as $t)
                                                            <option value="{{$t->id}}">
                                                                {{$t->naziv}}
                                                            </option>
                                                        @endforeach

                                                    </select>


                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="naziv">Naziv uređaja</label>
                                                        <input type="text" class="form-control" name="naziv" id="naziv" value="{{ old('naziv') }}" placeholder="Naziv uređaja">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sistem">Operativni sistem</label>
                                                        <input type="text" class="form-control" name="sistem" id="sistem" placeholder="Unesite sistem">


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="godina_izdanja">Godina izdanja</label>
                                                        <input type="number" class="form-control" name="godina_izdanja" id="godina_izdanja" placeholder="Unesite godinu izdanja uređaja">


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="velicina">Velicina uređaja</label>
                                                        <input type="number" class="form-control" name="velicina" id="velicina" placeholder="Velicina uređaja">


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kapacitet_baterije">kapacitet baterije uređaja</label>
                                                        <input type="number" class="form-control" name="kapacitet_baterije" id="kapacitet_baterije" placeholder="Kapacitet baterije">


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="memorija">Memorija uređaja</label>
                                                        <input type="number" class="form-control" name="memorija" id="memorija" placeholder="Memorija uređaja">


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="RAM">RAM uređaja</label>
                                                        <input type="number" class="form-control" name="RAM" id="RAM" placeholder="RAM uređaja">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kontakt">Vaš kontakt</label>
                                                        <input type="text" class="form-control" name="kontakt" id="kontakt" placeholder="Unesite način na koji vas korisnici mogu kontaktirati">


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cijena">Cijena uređaja</label>
                                                        <input type="number" class="form-control" name="cijena" id="cijena" placeholder="Cijena uređaja">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="boja">Boja uređaja</label>
                                                        <input type="text" class="form-control" name="boja" id="boja" placeholder="Boja uređaja">


                                                    </div>
                                                    <div class="form-group">
                                                        <label for="opis">Opis vašeg uređaja</label>
                                                        <input type="text" class="form-control" name="opis" id="opis" placeholder="Ukratko opišite vaš uređaj">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="location">Lokacija</label>
                                                        <input type="text" class="form-control" name="location" id="location" placeholder="Lokacija uređaja">

                                                    </div>
                                                    <label for="image" class="col-md-4 col-form-label">Dodajte sliku</label>

                                                    <input type="file" class="form-control-file" id = "image" name="image">

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                                        <button id="addDeviceBtn" type="submit" class="btn btn-primary">Spremi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
