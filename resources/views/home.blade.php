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
                    Što želite raditi danas?
                </h1>

                <br>
                <img src="https://i.pinimg.com/originals/c0/f8/ba/c0f8ba185db581d6f312d860f8004257.png">

            </div>
        </div>

    </div>
    </html>
@endsection
