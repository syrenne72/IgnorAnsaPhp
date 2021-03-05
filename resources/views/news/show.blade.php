<!-- contiene il menu e gli altri elementi comuni a tutte le pagine -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 w-25">
            <img src="/storage/{{$news->foto}}" alt="" style="width: 75%">
        </div>
        <div class="col-6 w-50">
            <div>
                <div class="font-weight-bold h1">{{$news->titolo}}</div>
                <div class="font-weight-normal h4">{{$news->descrizione}}</div>
                <p>
                    {{$news->articolo}}
                </p>

                <img src="{{$news->user->profileImage()}}" class="rounded-circle" style="max-height: 40px;">
                <a href="/profile/{{$news->user->id}}">
                    <span class="text-dark font-weight-bold">{{$news->user->nome}}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
