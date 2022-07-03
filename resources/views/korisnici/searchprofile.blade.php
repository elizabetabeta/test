@extends('layouts.app')

@section('content')
    <div class="container" id="visina">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')
            </div>
            <div class = "col-md-9">
                <div class="text text-light">
                    <form action="{{ route('searchprofile') }}" method="GET" role="search2">

                        <div class="input-group">
                            <div class="form-outline">
                                <input type="text" value="{{ $search2 }}" name="search2" placeholder="Pretraži..." class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <p><small class="text-light">Pretraži po nazivu ili email-u...</small></p>
                    </form>
                    <div class ="row pt-1 d-flex justify-content-center">

                        @if($users->isNotEmpty())
                        @foreach($users as $user)
                            <div class = "col-3">
                                @if(auth()->user()->id == $user->id)
                                    <a href="/profile{{ $user->id }}">
                                        <img src="/storage/{{ $user->profile_image }}" class="rounded-circle"
                                             style="height: 80px; width: 80px;border: medium solid lightgreen">
                                    </a>
                                    <h2 style="color: lightgreen">
                                        {{ $user->name }}
                                    </h2>
                                @else
                                <a href="/profile{{ $user->id }}">
                                    <img src="/storage/{{ $user->profile_image }}" class="rounded-circle"
                                         style="height: 80px; width: 80px;border: medium solid white">
                                </a>
                                <h2>
                                    {{ $user->name }}
                                </h2>
                                @endif
                            </div>
                        @endforeach
                            @else
                                <div>
                                    <h2 class="text text-danger"><b>Nema korisnika sa takvim nazivom.</b></h2>
                                </div>
                            @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    #visina{
        min-height: 100%;
    }
</style>
