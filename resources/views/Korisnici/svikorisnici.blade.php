@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">

                @include('layouts.menu')
            </div>
            <div class = "col-md-9">
                <div class="text text-light">
                    <form action="{{ route('searchprofile') }}" method="GET" role="search">

                        <div class="input-group">
                            <div class="form-outline">
                                <input type="text" name="searchprofile" placeholder="Pretraži..." class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <p><small class="text-light">Pretraži po nazivu ili email-u...</small></p>
                    </form>
                    <div class ="row pt-1 d-flex justify-content-center text-center">
                    @foreach($users as $user)
                            <div class = "col-3">
                                <a href="/profile{{ $user->id }}">
                            <img src="/storage/{{ $user->profile_image }}" class="rounded-circle"
                                 style="height: 80px; width: 80px;border: medium solid white">
                                </a>
                                <h2>
                                    {{ $user->name }}
                                </h2>
                            </div>
                        @endforeach
                    </div>
                </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                {{$users->links('pagination::bootstrap-4')}}
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
