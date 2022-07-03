@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @include('layouts.menu')
        </div>
        <div class="col-md-9" id="visina">
            <div class="card">
                <div class="card-header">Administracija korisnika</div>
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

                        <div class="row">
                            <div class="col">
                                <form action="{{ route('searchuser') }}" method="GET" role="search">

                                    <div class="input-group">
                                        <div class="form-outline">
                                            <input type="text" name="search" placeholder="Pretrazi..." class="form-control" />
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                    <p><small class="text-muted">Pretraži po nazivu ili email-u...</small></p>
                                </form>
                            </div>
                        <div class="col">

                        <button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#exampleModalCenter">
                            Dodaj novog korisnika
                        </button>
                        </div>
                        <br><br><br>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title text-primary">Korisnici</h3>
                                <!--<div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div>-->
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Ime</th>
                                        <th>E-mail</th>
                                        <th>Uloga</th>
                                        <th>Datum registracije</th>
                                        <th>Profil</th>
                                        <th>Akcije</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <img src="/storage/{{ $user->profile_image }}"
                                                 alt="korisnik" class="rounded-circle"
                                                 style="height: 50px; width: 50px">
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->role }}
                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            <a href="/profile{{ $user->id }}" class="text-muted">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/user{{ $user->id }}edit" type="btn btn-success" class="btn btn-success mb-2">
                                                Uloga
                                            </a>
                                            @if($user->role != "Admin")
                                            <a href="/userdelete{{ $user->id }}" class="btn btn-danger mb-2">
                                                Obriši
                                            </a>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                     {{$users->links('pagination::bootstrap-4')}}
                                </div>

                            </div>
                        </div>

                        <!-- Modal za dodavanje novog korisnika -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <form method="POST" action="{{ route('users.add') }}">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Dodavanje korisnika</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Zatvori">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Ime korisnika</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name2" value="{{ old('name') }}" placeholder="Unesite ime korisnika">

                                                @error('name')
                                                     <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email adresa</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email2" aria-describedby="emailHelp" placeholder="Unesite e-mail">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="password">Lozinka</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password2" placeholder="Unesite lozinku">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Ponovite lozinku</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Ponovno unesite lozinku">

                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                     </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                            <button id="addUserBtn" type="submit" class="btn btn-primary">Spremi</button>
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
