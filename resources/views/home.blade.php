@extends('layouts.app')

@section('content')
    <html>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')

            </div>
            <div class = "col-md-9 text-center" id="visina">

                <h1 class="text text-light">Dobrodošli! <br>

                </h1>

                <img src="lapitopi.png" style=" display: block; margin-left: auto;margin-right: auto; width: 50%;">

            </div>
        </div>

    </div>
    </html>
@endsection
