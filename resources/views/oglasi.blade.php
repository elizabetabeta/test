@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @User
                @include('layouts.usermenu')
                @endUser
                @Moderator
                @include('layouts.moderatormenu')
                @endModerator
                @Admin
                @include('layouts.menu')
                @endAdmin
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Oglasi</div>
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

                        <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#exampleModalCenter">
                            Dodaj novi oglas
                        </button>

                        @foreach($devices as $device)

                            <table class="table" style="background-color: #757575; color: white">
                                <tr>
                                    <td rowspan="7"><a href="#">
                                        <img src="/storage/{{ $device->image }}" style="height: 300px;padding: 5px">
                                    </a></td>

                                </tr>

                                <tr>
                                    <th>Tip</th>
                                    <td class="col-4">{{ $device->tip }}</td>
                                    <td class="col-3"></td>
                                </tr>
                                    <tr>
                                        <th>Naziv</th>
                                        <td>{{ $device->naziv }}</td>
                                        <td class="col-3"></td>

                                    </tr>
                                <tr>
                                    <th>Cijena</th>
                                    <td>{{ $device->cijena }} KM</td>
                                    <td class="col-3"></td>

                                </tr>

                                <tr>
                                     <th>Boja</th>
                                    <td>{{ $device->boja }}</td>
                                    <td class="col-3"></td>

                                </tr>


                                <tr>
                                    <th>Kratki opis uređaja</th>
                                    <td>{{ $device->opis }}</td>

                                </tr>

                                <tr>
                                    <td class="col-5">
                                        <a href="#"
                                           style="color: #39005c;font-size: 20px">
                                            Detaljno...
                                        </a>
                                    </td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route("devices.delete", $device->id) }}" class = "btn btn-danger">Obriši ovaj oglas</a>
                                    </td>
                                </tr>
                            </table>

                                <img src="http://ebis.co.za/main/wp-content/plugins/perspective/perspective/images/apple-devices-minimal.png" alt="#"
                                style="height: 80px; padding-left: 280px; margin-top: 20px; margin-bottom: 25px">

                        @endforeach


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <form method="POST" action="/oglas" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Dodavanje oglasa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Zatvori">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tip">Tip uređaja</label>
                                                <input type="text" class="form-control" name="tip" id="tip" value="{{ old('tip') }}" placeholder="Mobitel, tablet, laptop...">


                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="naziv">Naziv uređaja</label>
                                                    <input type="text" class="form-control" name="naziv" id="name" value="{{ old('naziv') }}" placeholder="Naziv uređaja">


                                            </div>
                                            <div class="form-group">
                                                <label for="sistem">Operativni sistem</label>
                                                <input type="sistem" class="form-control" name="sistem" id="sistem" placeholder="Unesite sistem">


                                            </div>
                                            <div class="form-group">
                                                <label for="godina_izdanja">Godina izdanja</label>
                                                <input type="godina_izdanja" class="form-control" name="godina_izdanja" id="godina_izdanja" placeholder="Unesite godinu izdanja uređaja">


                                            </div>
                                            <div class="form-group">
                                                <label for="velicina">Velicina uređaja</label>
                                                <input type="velicina" class="form-control" name="velicina" id="velicina" placeholder="Velicina uređaja">


                                            </div>
                                            <div class="form-group">
                                                <label for="kapacitet_baterije">kapacitet baterije uređaja</label>
                                                <input type="kapacitet_baterije" class="form-control" name="kapacitet_baterije" id="kapacitet_baterije" placeholder="Kapacitet baterije">


                                            </div>
                                            <div class="form-group">
                                                <label for="memorija">Memorija uređaja</label>
                                                <input type="memorija" class="form-control" name="memorija" id="memorija" placeholder="Memorija uređaja">


                                            </div>
                                            <div class="form-group">
                                                <label for="RAM">RAM uređaja</label>
                                                <input type="RAM" class="form-control" name="RAM" id="RAM" placeholder="RAM uređaja">

                                            </div>
                                            <div class="form-group">
                                                <label for="kontakt">Vaš kontakt</label>
                                                <input type="kontakt" class="form-control" name="kontakt" id="kontakt" placeholder="Unesite način na koji vas korisnici mogu kontaktirati">


                                            </div>
                                            <div class="form-group">
                                                <label for="cijena">Cijena uređaja</label>
                                                <input type="cijena" class="form-control" name="cijena" id="cijena" placeholder="Cijena uređaja">

                                            </div>
                                            <div class="form-group">
                                                <label for="boja">Boja uređaja</label>
                                                <input type="boja" class="form-control" name="boja" id="boja" placeholder="Boja uređaja">


                                            </div>
                                            <div class="form-group">
                                                <label for="opis">Opis vašeg uređaja</label>
                                                <input type="opis" class="form-control" name="opis" id="opis" placeholder="Ukratko opišite vaš uređaj">

                                            </div>
                                                <label for="image" class="col-md-4 col-form-label">Dodajte sliku</label>

                                                <input type="file", class="form-control-file" id = "image" name="image">

                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                            <button id="addDeviceBtn" type="submit" class="btn btn-primary">Spremi</button>
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
