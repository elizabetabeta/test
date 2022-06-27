@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')

            </div>
            <div class = "col-md-9 text-center">

                <h1>Dobrodošli!</h1>
                <br>
                <div class="text-center">
                    <h1 class="text text-primary">
                        Vaše informacije
                    </h1>
                    <h2>
                        Username: {{ Auth::user()->name }}
                    </h2>
                    <h2>
                        Email: {{ Auth::user()->email }}
                    </h2>
                    <h2>
                        Rola: {{ Auth::user()->role }}
                    </h2>
                    <h2>
                        Vrijeme pridruživanja: <br> {{ Auth::user()->created_at }}
                    </h2>
                </div>

            </div>
        </div>
        <br><br><br><br><br><br><br>
    </div>
    <br>

@endsection
