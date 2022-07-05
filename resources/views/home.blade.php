@extends('layouts.app')

@section('content')
    <html>
    <div class="container" id="visina">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')

            </div>


            <div class = "col-md-9" >


                <!--<p class="text-light">{{ now()->format('d.m.Y.') }}</p>-->

                <div class="row">
                    <div class="col text-center text-light">
                        <div class="text-light">
                        <img src="logo.png" alt="slika"><i class="fa-solid fa-mobile-screen-button"></i>
                        </div>

                        <h1 class="text text-light">
                            <br>
                            Dobrodošli {{ Auth()->user()->name }}!
                        </h1>
                        <img class="img-fluid float-right"
                             src="https://www.pngall.com/wp-content/uploads/2016/04/Computer-PC-Download-PNG.png">
                        </div>
                </div>

            </div>
        </div>

    </div>
    </html>
@endsection

<style>
    #visina {
        min-height: 100%;
    }
</style>
