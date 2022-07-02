@extends('layouts.app')

@section('content')
    <div class="container" style="min-height: 480px" id="slika">
        <form action="{{ url('user/update/'.$user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group row">

                    <div class = "row">
                        <h1 class="text text-primary">Promijeni ulogu za {{ $user->name }}</h1>
                    </div>
                    <br><br><br>
                    <div class="row">
                    <div class="form-group col">
                        <label for="role" class="col-md-4 col-form-label">Uloga</label>

                        <select id="role" class="form-control @error('role') is-invalid @enderror"
                               name="role" value="{{ $user->role }}"
                                autocomplete="name" autofocus>
                            <option value="{{ $user->role }}">Izaberi ulogu korisnika</option>
                            <option>
                                Admin
                            </option>
                            <option>
                                Moderator
                            </option>
                            <option>
                                User
                            </option>
                        </select>

                        @error('role')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    </div>

                    <br>
                    <div class="pt-4">
                        <button class="btn btn-primary" type="submit">
                            Promijeni rolu
                        </button>
                        <a href="/users" class="btn btn-outline-primary">
                            Odustani
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection

<style>
    #slika{
        background-image: linear-gradient(whitesmoke, antiquewhite);
        border-radius: 15px;

    }
</style>
