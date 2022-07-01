@extends('layouts.app')

@section('content')
    <div class="container"> <!--enctype="multipart/form-data"-->
        <form action="{{ url('oglasi/update/'.$device->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group row">

                    <div class = "row">
                        <h1>Uredi oglas</h1>
                    </div>
                    <br><br><br>

                    <div class="form-group">
                        <label for="device_type_id" class="col-md-4 col-form-label">Tip uređaja</label>
                        <select
                            class="form-control"  name="device_type_id" id="device_type_id">
                            <option value="{{ $device->device_type_id }}">Izaberi tip uređaja</option>

                        @foreach($type as $t)
                                <option value="{{$t->id}}">
                                    {{$t->naziv}}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="naziv" class="col-md-4 col-form-label">naziv</label>

                        <input id="naziv" type="text" class="form-control @error('naziv') is-invalid @enderror"
                               name="naziv" value="{{ old('naziv') ?? $device->naziv }}"
                               autocomplete="naziv" autofocus>

                        @error('naziv')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="sistem" class="col-md-4 col-form-label">sistem</label>

                        <input id="sistem" type="text" class="form-control @error('sistem') is-invalid @enderror"
                               name="sistem" value="{{ old('sistem') ?? $device->sistem }}"
                               autocomplete="sistem" autofocus>

                        @error('sistem')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="cijena" class="col-md-4 col-form-label">cijena</label>

                        <input id="cijena" type="text" class="form-control @error('cijena') is-invalid @enderror"
                               name="cijena" value="{{ old('cijena') ?? $device->cijena }}"
                               autocomplete="cijena" autofocus>

                        @error('cijena')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="godina_izdanja" class="col-md-4 col-form-label">godina_izdanja</label>

                        <input id="godina_izdanja" type="text" class="form-control @error('godina_izdanja') is-invalid @enderror"
                               name="godina_izdanja" value="{{ old('godina_izdanja') ?? $device->godina_izdanja }}"
                               autocomplete="godina_izdanja" autofocus>

                        @error('godina_izdanja')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="boja" class="col-md-4 col-form-label">boja</label>

                        <input id="boja" type="text" class="form-control @error('boja') is-invalid @enderror"
                               name="boja" value="{{ old('boja') ?? $device->boja }}"
                               autocomplete="boja" autofocus>

                        @error('boja')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="velicina" class="col-md-4 col-form-label">velicina</label>

                        <input id="velicina" type="text" class="form-control @error('velicina') is-invalid @enderror"
                               name="velicina" value="{{ old('velicina') ?? $device->velicina }}"
                               autocomplete="velicina" autofocus>

                        @error('velicina')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="kapacitet_baterije" class="col-md-4 col-form-label">kapacitet_baterije</label>

                        <input id="kapacitet_baterije" type="text" class="form-control @error('kapacitet_baterije') is-invalid @enderror"
                               name="kapacitet_baterije" value="{{ old('kapacitet_baterije') ?? $device->kapacitet_baterije }}"
                               autocomplete="kapacitet_baterije" autofocus>

                        @error('kapacitet_baterije')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="memorija" class="col-md-4 col-form-label">memorija</label>

                        <input id="memorija" type="text" class="form-control @error('memorija') is-invalid @enderror"
                               name="memorija" value="{{ old('memorija') ?? $device->memorija }}"
                               autocomplete="memorija" autofocus>

                        @error('memorija')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="RAM" class="col-md-4 col-form-label">RAM</label>

                        <input id="RAM" type="text" class="form-control @error('RAM') is-invalid @enderror"
                               name="RAM" value="{{ old('RAM') ?? $device->RAM }}"
                               autocomplete="RAM" autofocus>

                        @error('RAM')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="kontakt" class="col-md-4 col-form-label">kontakt</label>

                        <input id="kontakt" type="text" class="form-control @error('kontakt') is-invalid @enderror"
                               name="kontakt" value="{{ old('kontakt') ?? $device->kontakt }}"
                               autocomplete="kontakt" autofocus>

                        @error('kontakt')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-md-4 col-form-label">Lokacija</label>

                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror"
                               name="location" value="{{ old('location') ?? $device->location }}"
                               autocomplete="location" autofocus>

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="opis" class="col-md-4 col-form-label">opis</label>

                        <input id="opis" type="text" class="form-control @error('opis') is-invalid @enderror"
                               name="opis" value="{{ old('opis') ?? $device->opis }}"
                               autocomplete="opis" autofocus>

                        @error('opis')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Profile Picture</label>

                        <input type="file" class="form-control-file" id = "image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="pt-4">
                        <button class="btn btn-primary" type="submit">
                            Spremi promjene
                        </button>
                        <a href="/oglasi/{{ $device->id }}}" class="btn btn-outline-primary">
                            Odustani
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>

        @endsection
