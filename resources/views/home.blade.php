@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @Admin
                @include('layouts.menu')
                @endAdmin

                @Moderator
                @endModerator

                @User
                <ul class="list-group">
                    <li class="list-group-item">Moji oglasi</li>
                    <li class="list-group-item">Drugi oglasi</li>
                    <li class="list-group-item">Kupljeno</li>
                    <li class="list-group-item">Prodano</li>
                </ul>
                @endUser

            </div>
            <div class = "col-md-9"></div>
        </div>
    </div>
@endsection
