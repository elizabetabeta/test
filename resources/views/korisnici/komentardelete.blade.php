@extends('layouts.app')

@section('content')
    <div class="container" id="slika">
        <form>
            @csrf

            <div class="row">
                <div class="form-group row">

                    <div class = "row">
                        <h1 class="text text-danger">Jeste li sigurni da želite obrisati ovaj komentar?</h1>
                    </div>
                    <br><br><br>

                    <div class="row">

                        <div class="form-group col">
                            <label for="comment" class="col-md-4 col-form-label">Komentar</label>

                            <input id="comment" disabled type="text" class="form-control @error('comment') is-invalid @enderror"
                                   name="comment" value="{{ $comment->comment }}"
                                   autocomplete="comment" autofocus>

                            @error('comment')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <br>
                    <div class="pt-4">

                        <br>

                        <a href="{{ route("comment.delete", $comment->id) }}" class = "btn btn-danger">Obriši</a>

                        <a href="/comments{{ $comment->profile_id }}" class="btn btn-secondary"> Odustani </a>
                    </div>


                </div>
            </div>
        </form>
    </div>


@endsection

<style>
    #slika {
        background-image: linear-gradient(whitesmoke, antiquewhite);
        border-radius: 15px;
    }
</style>
