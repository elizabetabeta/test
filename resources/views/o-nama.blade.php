@include('layouts.app')

<body class="antialiased">
<div>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Vaš profil</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Prijava</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registracija</a>
                @endif
            @endauth
        </div>
    @endif
    <br><br>
        <div id = "sve" style="text-align: center">
                <br>
        <h1 style="text-align:center;color:darkblue;font-size:40px">O nama</h1> <br><br>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img style="height: 300px;padding: 5px"
                            src="Ivona.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Ivona Krezić</h5>
                            <p class="card-text">
                                Studentica 3. godine informatike
                                Imam 22 godine, dolazim iz Mostara.
                                Slobodno vrijeme nastojim iskoristiti sto
                                efektivnije, tako da se bavim sportom,
                                vozim biciklo, boksam, družiti se sa
                                prijateljima, putujem, te učim
                                uvijek nešto novo pretražujući internet.
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img style="height: 300px;padding: 5px"
                             src="Elizabeta.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Elizabeta Miličević</h5>
                            <p class="card-text">
                                Studentica 3. godine informatike
                                Imam 22 godine, dolazim iz Kiseljaka.
                                U slobodno vrijeme volim crtati, svirati klavir,
                                čitati knjige i provoditi vrijeme sa svojim
                                prijateljima.
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>


                <br><br><br><br>
            </div>
            <footer class="bg-light text-center text-lg-start">
                <div class="text-center" style="background-color: black;color:white;">
                    © 2022 Copyright: Prodaja uređaja PRUR
                </div>
            </footer>
        </div>

<style>
    #pozadina {
        background-color:lightgray;
    }

    #sve{
        background: linear-gradient(to bottom, whitesmoke 0%, lightgray 100%);
    }

    #text{
        font-family: 'Times New Roman', Times, serif;
    }
    .table {
        margin-left: auto;
        margin-right: auto;
    }

</style>
