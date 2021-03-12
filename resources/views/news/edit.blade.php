<!-- contiene il menu e gli altri elementi comuni a tutte le pagine -->
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/n/{{$news->id}}" enctype="multipart/form-data" method="post">

        <!-- aggiunge una chiave di autenticazione -->
        @csrf

        {{-- Indica che si tratta di un update --}}
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row pb-3">
                    <h2>Modifica una notizia</h2>
                </div>

                <div class="form-group row">
                    <label for="titolo" class="col-md-4 col-form-label">Nuovo titolo</label>

                    <input id="titolo" type="text"
                           class="form-control @error('titolo') is-invalid @enderror ml-3"
                           name="titolo" value="{{$news->titolo}}" required autocomplete="Titolo" autofocus>

                    @error('titolo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="descrizione" class="col-md-4 col-form-label">Nuova descrizione</label>

                    <input id="descrizione" type="text"
                           class="form-control @error('descrizione') is-invalid @enderror ml-3"
                           name="descrizione" value="{{ $news->descrizione }}" autofocus>

                    @error('descrizione')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="categoria" class="col-md-4 col-form-label">Categoria</label>

                    <select id="categoria" name="categoria">
                        <option value="attualita">Attualita</option>
                        <option value="flash">Flash News</option>
                        <option value="medicina">Medicina</option>
                        <option value="sport">Sport</option>
                        <option value="mondo_animale">Mondo animale</option>
                        <option value="spettacolo">Spettacolo</option>
                        <option value="arte">Arte</option>
                        <option value="lifestyle">Lifestyle</option>
                        <option value="educazione">Educazione</option>
                        <option value="social">Social</option>
                        <option value="politica">Politica</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label for="articolo" class="col-md-4 col-form-label">Nuovo articolo</label>

                    <textarea id="articolo" class="form-control ml-3"
                              name="articolo" cols="60" rows="8" autofocus>@if($news->articolo){{$news->articolo}}@endif</textarea>
                </div>

                <div class="row">
                    <label for="foto" class="col-md-4 col-form-label">Nuova foto</label>
                    <input type="file" class="form-control-file ml-3" id="foto" name="foto">

                    @if ($errors->has('foto'))
                        <strong>{{ $errors->first('foto') }}</strong>
                    @endif
                </div>

                <div class="row pt-5">
                    <button class="btn-primary">Salva modifiche</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
