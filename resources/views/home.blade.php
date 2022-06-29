@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')

            </div>
            <div class = "col-md-9 text-center" id="visina">

                <h1 class="text text-light">Dobrodošli! <br>
                    Što želite raditi danas?
                </h1>

                <br>
                <div class="text-center">

                </div>

            </div>
        </div>

    </div>

@endsection
