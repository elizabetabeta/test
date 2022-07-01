@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.menu')
                <h2 class="text text-light text-center" id="broj">Broj oglasa: {{ $number }}</h2>

                <br>
            </div>
            <div class="col-md-9" id="visina">
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

                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('search') }}" method="GET" role="search">

                                        <div class="input-group">
                                            <div class="form-outline">
                                                <input type="text" name="search" value="{{$search}}" class="form-control" />
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        <p><small class="text-muted">Pretraži po nazivu, sistemu ili max cijeni...</small></p>
                                    </form>

                                </div>
                                <div class="col">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Filter
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/oglasi">Svi oglasi</a>
                                            <a class="dropdown-item" href="/dostupni">Dostupni</a>
                                            <a class="dropdown-item" href="/prodani">Prodani</a>

                                        </div>
                                    </div>
                                </div>
                            <div class="col">

                                <a href="/oglasi" type="button" class="btn btn-outline-primary mb-3 float-right">
                                    Svi oglasi
                                </a>
                            </div>
                        </div>

                        <br>

                      @if($devices->isNotEmpty())
                        @foreach($devices as $device)

                            <div class="card mb-3" id="oglasikartice">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <a href="/oglasi{{ $device->id }}">
                                            <img style="border-radius: 25px"
                                                 src="/storage/{{ $device->image }}" class="img-fluid rounded-start pb-2 ps-2" alt="Nema slike...">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <a href="/oglasi/{{ $device->id }}" style="text-decoration: none">
                                                <h5 class="card-text">{{ $device->naziv }}</h5>
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

                    @endforeach

                            @else
                                <div>
                                    <h2 class="text text-danger">Nema oglasa sa takvim nazivom.</h2>
                                </div>
                            @endif


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<style>
    #broj{
        background-color: transparent;
        border: 1px solid white;
        border-radius: 15px;
        font-family: "Roboto", sans-serif;
    }
</style>


