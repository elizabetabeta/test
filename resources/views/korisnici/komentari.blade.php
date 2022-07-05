@extends('layouts.app')

@section('content')
    <div class="container" id="visina">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')
                <br>

            </div>
            <div class = "col-md-9" >
                <div class="text text-light">
                    <div class ="d-flex align-content-center flex-wrap">
                        <div class = "col">

                            <img src="/storage/{{ $user->profile_image }}" class="rounded-circle" id="flo"
                                 style="height: 160px; width: 160px;border: medium solid white">
                        </div>
                        <div class="col">
                            <br>
                            <h2>
                                {{ $user->name }}
                            </h2>
                            <h2>
                                {{ $user->email }}
                            </h2>
                            <h2>
                                Datum pridruživanja:
                            </h2>
                            <h2>
                                {{ $user->created_at->format('d.m.Y.') }}
                            </h2>
                        </div>
                    </div>
                </div>

                <a href="/profile{{ $user->id }}" class = "btn btn-primary">
                    Oglasi
                </a>

                @if(Auth::user()->id == $user->id)
                    <a href="/editprofile{{ $user->id }}" class = "btn btn-primary mb-2 float-right">
                        Uredi svoj profil
                    </a>
                @endif

                <br>
                <h1 class="text text-light text-center"> Komentari: </h1> <br>
                <div class="row" id="kart"><br>
                    <div class="col">
                        <a href="/profile{{ $user->id }}" class="btn btn-secondary"> Nazad </a>
                    <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#comment">
                        Dodaj komentar
                    </button>
                    </div>
                    @if($broj == 0)
                        <h1 class="text text-danger text-center">
                            Ovaj korisnik nema komentara. <br><br>
                        </h1>
                    @endif

                            <div class="card" style="background-color: whitesmoke;border-color: whitesmoke">
                                <div class="card-body">
                                    @foreach($komentari as $comment)

                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex flex-start">
                                                <a href="/profile{{ $comment->user->id }}">
                                                @if($comment->user->id == auth()->user()->id)

                                                <img class="rounded-circle shadow-1-strong me-3"
                                                     src="/storage/{{ $comment->user->profile_image }}"
                                                     style="border: medium solid lightgreen"
                                                     alt="avatar" width="65"
                                                     height="65" />
                                                @elseif($comment->user->id == $user->id)
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                         src="/storage/{{ $comment->user->profile_image }}"
                                                         style="border: medium solid lightskyblue"
                                                         alt="avatar" width="65"
                                                         height="65" />
                                                @else
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                         src="/storage/{{ $comment->user->profile_image }}"
                                                         style="border: medium solid white"
                                                         alt="avatar" width="65"
                                                         height="65" />
                                                @endif
                                                </a>
                                                <div class="flex-grow-1 flex-shrink-1">
                                                    <div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <p class="mb-1">
                                                                <a href="/profile{{ $comment->user->id }}"  style="text-decoration: none">
                                                                {{ $comment->user->name }}
                                                                </a>
                                                                <span class="small">
                                                                    - {{ $comment->created_at->diffForHumans() }}
                                                                </span>
                                                            </p>
                                                            @if($comment->user->id == auth()->user()->id
                                                                || auth()->user()->role == "Admin"
                                                                || auth()->user()->role == "Moderator")
                                                            <a href="/deletecomment{{ $comment->id }}"
                                                               class="text-danger" style="text-decoration: none">
                                                                <i class="fa-solid fa-ban"></i>
                                                                <span class="small"> obriši </span></a>
                                                            @endif
                                                        </div>
                                                        <p class="small mb-0">
                                                            {{ $comment->comment }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <hr>
                                    @endforeach
                                </div>

                </div>

                </div>
            </div>
            <br><br>
        </div>
    </div>
    <!-- Modal za dodavanje novog korisnika -->
    <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="comment" aria-hidden="true">
        <form method="POST" action="{{ url('comment/add/'.$user->id) }}">
            @csrf
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Dodavanje komentara</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Zatvori">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="comment">Vaš komentar:</label>
                            <input type="text" maxlength="191" class="form-control @error('comment') is-invalid @enderror" name="comment" id="comment" placeholder="Komentar...">

                            @error('comment')
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

@endsection


<style>
    #visina{
        min-height: 100%;
    }
    #kart{
        background-image: linear-gradient(whitesmoke, #c69bd4);
        border-radius: 15px;
    }

    #tekst {
        border: thick solid white;
        background-color: white;
        border-radius: 15px;
    }

    @media only screen and (min-width: 413px) {
        #flo{
            float: right;
        }
    }
</style>
