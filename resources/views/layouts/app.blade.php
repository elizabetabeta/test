<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-gray shadow-sm" id="pocetak">
            <div class="container" id="navbar2">
                <a class="navbar-brand" id="slova" href="{{ url('/') }}">
                    <img src="logo.png" class="pb-2"> <i class="fa-solid fa-mobile-screen-button"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" id="slova" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" id="slova" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="/profile{{ auth()->user()->id }}">
                                <img class="rounded-circle"
                                     style="height: 35px; width: 35px; border: medium solid white"
                                    src="/storage/{{ Auth::user()->profile_image }}"
                                     alt=".">
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(auth()->user()->role !== "Admin")
                                    <a class="dropdown-item" href="/profile{{ auth()->user()->id }}">Moj profil</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer text-light">
        <div class="container" id="footer2">
            &copy; 2022 - PRUR - <a href="/kontakt" style="color:lightblue; text-decoration:none" >Kontakt</a>
            <a class="float-right" id="gore" href="#pocetak">
                <i class="fa-solid fa-arrow-up" style="padding-left: 7px; padding-top: 5px"></i>
            </a>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
<style>

    #pozadina{
        background-color: transparent;
        background-size: cover;
    }

    .container {
        background-color: transparent;
        min-height: 100%;
        /*background-image: url("plavo.png");
        background-repeat: repeat-y;*/
    }

    @media only screen and (max-width: 600px) {
        #kartica{
            background-color: transparent;
            height: 600px;
            width: 300px;
            margin: auto;
            background-image: url("mobitel.png");
            background-size: 400px;
            background-position: center center;
            background-repeat: no-repeat;
            border: 1px solid transparent;
        }
    }
    @media only screen and (min-width: 600px) {

        #kartica {
            border: 1px solid transparent;
            background: transparent;
            /*background-image: url("slikica.png");
            background-repeat: no-repeat;*/

        }
    }
    @media only screen and (min-width: 1000px) {

        #kartica {
            border: 1px solid transparent;
            height: 500px;
            width: 800px;
            margin: auto;
            background: transparent;
            background-image: url("laptop.png");
            background-size: 950px;
            background-position: top;
            background-repeat: no-repeat;

        }
    }
     #nodeco{
         text-decoration: none;
     }

    #imgshadow {
        border-radius: 25px;
        -webkit-box-shadow: -16px 15px 16px 2px rgba(173,173,173,0.93);
        -moz-box-shadow: -16px 15px 16px 2px rgba(173,173,173,0.93);
        box-shadow: -16px 15px 16px 2px rgba(173,173,173,0.93);
    }

    .py-4{
        background-image: url("https://removal.ai/wp-content/uploads/2021/09/black-background-08-vecteezy.png");

        min-height: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        /*background-blend-mode: overlay;*/
    }

    #prozirno{
        background-image: linear-gradient(whitesmoke, #c69bd4);
        border: transparent;
    }

    .footer, .navbar{
        background-image: linear-gradient(to right, #15041f, #370252);
    }

    .footer{
        height: 45px;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }


    #footer2, #navbar2{
        background-color: transparent;
    }

    #email, #password, #remember, #name, #password-confirm {
        background-color: transparent;
        border-color: white;
        color: white;
    }

    #slova, #navbarDropdown{
        color: white;
    }

    #oglasikartice{
        background-color: transparent;
        border-radius: 15px;
        border-color: transparent;
    }

    #gore{
        height: 25px;
        width: 25px;
        border-radius: 10px;
        background-color: transparent;
        border: thin solid white;
        color: white;
    }

    body {
        padding-bottom: 45px;
    }

</style>
