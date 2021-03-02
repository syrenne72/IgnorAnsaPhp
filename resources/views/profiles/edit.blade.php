<!-- contiene il menu e gli altri elementi comuni a tutte le pagine -->
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        <!-- aggiunge una chiave di autenticazione -->
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row pb-3">
                    <h2>Informazioni personali</h2>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-md-4 col-form-label">Nome</label>

                    <input id="nome" type="text"
                           class="form-control @error('titolo') is-invalid @enderror ml-3"
                           name="nome" value="{{ old('nome') ?? $user->nome }}" required autocomplete="nome" autofocus>

                    @error('nome')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label">Username</label>

                    <input id="username" type="text"
                           class="form-control @error('username') is-invalid @enderror ml-3"
                           name="username" value="{{ old('username') ?? $user->username }}" autofocus>

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">Email</label>

                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror ml-3"
                           name="email" value="{{ old('email') ?? $user->email }}"autofocus>
                </div>

                <div class="form-group row">
                    <label for="bio" class="col-md-4 col-form-label">Bio</label>

                    <input id="bio" type="bio"
                           class="form-control @error('bio') is-invalid @enderror ml-3"
                           name="bio" value="{{ old('bio') ?? $user->bio }}"autofocus>
                </div>

                <div class="row">
                    <label for="foto" class="col-md-4 col-form-label">Foto</label>
                    <input type="file" class="form-control-file ml-3" id="foto" name="foto">

                    @if ($errors->has('foto'))
                        <strong>{{ $errors->first('foto') }}</strong>
                    @endif
                </div>

                <div class="row pt-5">
                    <button class="btn-primary">Salva</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
