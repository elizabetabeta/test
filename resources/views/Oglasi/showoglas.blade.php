@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4">

                     <img src="/storage/{{ $device->image }}" id="imgshadow" style="height: 300px; width: 300px">

                <br><br><br>

                @if( $device->isSold === 0 )
                    <h1 class="text text-success">
                        <i class="fa-solid fa-circle-check"></i>
                        Dostupno
                    </h1>
                    @if(auth()->user()->id === $device->user_id)
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                data-target="#modalProdano">
                            Prodali ste uređaj?
                        </button>
               <br>
                    @endif

                @else
                    <h1 class="text text-danger">
                        <i class="fa-solid fa-circle-xmark"></i>
                        Prodano
                    </h1>
                @endif


                @if(Auth::user()->id == $device->user_id || auth()->user()->role == "Admin")
                <a href="/oglasi/edit/{{ $device->id }}" class = "btn btn-primary mb-2">
                    Uredi
                </a>

                <button type="button" class="btn btn-danger mb-2" data-toggle="modal"
                        data-target="#modalForDelete">
                    Obriši
                </button>
                @endif

                <a href="/oglasi" class="btn btn-outline-primary mb-2 ">Svi oglasi</a>
                @if(auth()->user()->role !== "Admin")
                    <a href="/mojioglasi" class="btn btn-outline-success mb-2">Moji oglasi</a>
                @endif

            </div>
            <img id="eh" src="https://commons.wikimedia.org/wiki/File:HD_transparent_picture.png">

            <div class="col">
                <h1 class="text text-primary">
                    {{ $device->naziv }}
                </h1>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th colspan="2">
                                {{ $device->type->naziv }}
                            </th>
                        </tr>
                        <tr>
                            <th>
                                Sistem:
                            </th>
                            <td>
                                {{ $device->sistem }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Cijena:
                            </th>
                            <td>
                                {{ $device->cijena }} KM
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Godina izdanja:
                            </th>
                            <td>
                                {{ $device->godina_izdanja }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Boja:
                            </th>
                            <td>
                                {{ $device->boja }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Velicina
                            </th>
                            <td>
                                {{ $device->velicina }} inča
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Kapacitet baterije:
                            </th>
                            <td>
                                {{ $device->kapacitet_baterije }} mAh
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Memorija:
                            </th>
                            <td>
                                {{ $device->memorija }} GB
                            </td>
                        </tr>
                        <tr>
                            <th>
                                RAM:
                            </th>
                            <td>
                                {{ $device->RAM }} GB
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Kontaktirajte korisnika:
                            </th>
                            <td>
                                {{ $device->kontakt }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Lokacija:
                            </th>
                            <td>
                                {{ $device->location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Kratki opis uređaja:
                            </th>
                            <td>
                                {{ $device->opis }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Dodan datuma:
                            </th>
                            <td>
                                {{ $device->created_at->toDateString() }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Vlasnik oglasa:
                            </th>
                            @foreach($user as $u)
                                    <td>
                                        <a href="/profile{{ $u->id }}">
                                        {{ $u->name }}
                                        </a>
                                    </td>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>

            </div>

        <!-- MODAL ZA PRODANO -->
        <div class="modal fade" id="modalProdano" tabindex="-1" aria-labelledby="modalProdano" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success" id="exampleModalLabel">
                            Prodali ste uređaj?
                        </h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body align-center">
                        <table>
                            <tr>
                                <td>
                                    <p class="text-success"> Čestitamo na uspješno obavljenoj prodaji! </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                        <a href="{{ route("devices.isSold", $device->id) }}" class = "btn btn-success">Potvrdi</a>
                    </div>
                </div>
            </div>
        </div>

            <!-- MODAL ZA DELETE -->
            <div class="modal fade" id="modalForDelete" tabindex="-1" aria-labelledby="modalForDelete" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel">
                                Jeste li sigurni da želite obrisati ovaj oglas?
                            </h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body align-center">
                            <table>
                                <tr>
                                    <td>
                                        <img src="https://static.thenounproject.com/png/358467-200.png">
                                    </td>
                                    <td>
                                        <p class="text-danger"> Pažljivo! Ako ga obrišete, ne možete ga vratiti!</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                            <a href="{{ route("devices.delete", $device->id) }}" class = "btn btn-danger">Obriši</a>
                        </div>
                    </div>
                </div>
            </div>


            </div>
    </div>

@endsection

<style>
    @media (max-width: 990px) {

        #eh {
            height: 2px;
            width: 300px;
        }

    }
    @media (min-width: 990px) {

        #eh {
            width: 1px;
        }

    }

    .table{
        border-color: transparent;
        color: transparent;
    }

    .container{
        background-image: url("loginregister.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-color: rgba(255, 255, 255, 0.486);
        background-blend-mode: overlay;
    }
</style>
