<!-- contiene il menu e gli altri elementi comuni a tutte le pagine -->
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/n" enctype="multipart/form-data" method="post">
        <!-- aggiunge una chiave di autenticazione -->
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row pb-3">
                    <h2>Aggiungi una notizia</h2>
                </div>

                <div class="form-group row">
                    <label for="titolo" class="col-md-4 col-form-label">Titolo</label>

                    <input id="titolo" type="text"
                           class="form-control @error('titolo') is-invalid @enderror ml-3"
                           name="titolo" value="{{ old('titolo') }}" required autocomplete="Titolo" autofocus>

                    @error('titolo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="descrizione" class="col-md-4 col-form-label">Descrizione</label>

                    <input id="descrizione" type="text"
                           class="form-control @error('descrizione') is-invalid @enderror ml-3"
                           name="descrizione" value="{{ old('descrizione') }}" autofocus>

                    @error('descrizione')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="articolo" class="col-md-4 col-form-label">Articolo</label>

                    <textarea id="articolo" class="form-control ml-3"
                              name="articolo" cols="60" rows="8" autofocus></textarea>
                </div>

                <div class="row">
                    <label for="foto" class="col-md-4 col-form-label">Foto</label>
                    <input type="file" class="form-control-file ml-3" id="foto" name="foto">

                    @if ($errors->has('foto'))
                        <strong>{{ $errors->first('foto') }}</strong>
                    @endif
                </div>

                <div class="row pt-5">
                    <button class="btn-primary">Aggiungi la notizia</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
