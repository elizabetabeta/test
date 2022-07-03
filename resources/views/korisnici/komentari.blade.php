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
                    <div class ="d-flex">
                        <div class = "col-5 p-3">

                            <img src="/storage/{{ $user->profile_image }}" class="rounded-circle float-right"
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
                                {{ $user->created_at->toDateString() }}
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
                            @foreach($komentari as $comment)
                            @if($comment->user->id == auth()->user()->id)
                            <div class ="row pt-1 ms-2">
                                <div class ="col-1">
                                    <a href="/profile{{ $comment->user->id }}">
                                        <img src="/storage/{{ $comment->user->profile_image }}"
                                             class="rounded-circle float-right"
                                             style="height: 35px; width: 35px;border: medium solid lightgreen">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <a href="/profile{{ $comment->user->id }}" style="text-decoration: none;">
                                        <h6 class="text text-primary pt-2"> {{ $comment->user->name }}</h6>
                                    </a>
                                </div>
                                    <div class="col">

                                    <button class="btn btn-outline-primary"> Uredi </button>
                                    <a href="/deletecomment{{ $comment->id }}" class="btn btn-danger"> Obriši </a>

                                    </div>
                            </div>
                            <div class="row ms-2">
                                <div class="col-10">
                                <p id="tekst"> {{ $comment->comment }}</p>
                                    <small class=" d-flex justify-content-end text-muted">
                                        {{ $comment->created_at }}
                                    </small>
                                </div>
                            </div>

                                @else
                        <div class ="row pt-1 ms-2">
                        <div class ="col-1">
                            <a href="/profile{{ $comment->user->id }}">
                                    <img src="/storage/{{ $comment->user->profile_image }}"
                                         class="rounded-circle float-right"
                                         style="height: 35px; width: 35px;border: medium solid white">
                            </a>
                        </div>
                            <div class="col">
                                <a href="/profile{{ $comment->user->id }}" style="text-decoration: none;">
                                <h6 class="text text-primary pt-2"> {{ $comment->user->name }}</h6>
                                </a>
                            </div>
                        </div>
                            <div class="row ms-2">
                                <div class="col-10">
                                    <p id="tekst"> {{ $comment->comment }}</p>
                                    <small class=" d-flex justify-content-end text-muted">
                                        {{ $comment->created_at }}
                                    </small>
                                    <br>
                                </div>
                            </div>
                        @endif
                            @endforeach
                </div>

                </div>
            </div>
            <br><br>
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
        background-image: linear-gradient(whitesmoke, navajowhite);
        border-radius: 15px;
    }

    #tekst {
        border: thick solid white;
        background-color: white;
        border-radius: 15px;
    }
</style>
