@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @Admin
                @include('layouts.menu')
                @endAdmin

                @Moderator
                @include('layouts.moderatormenu')
                @endModerator

                @User
                @include('layouts.usermenu')
                @endUser

            </div>
            <div class = "col-md-9"></div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

@endsection
