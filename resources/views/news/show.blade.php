<!-- contiene il menu e gli altri elementi comuni a tutte le pagine -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 w-25">
            <img src="/storage/{{$news->foto}}" alt="" style="width: 100%">
        </div>
        <div class="col-6 w-50">
            <div>
                <h3>{{$news->titolo}}</h3>
                <p>{{$news->descrizione}}</p>
            </div>
        </div>

        <div class="row mt-4 align-items-center">
            <span class="col-2">
                <img src="{{$news->user->profileImage()}}" class="rounded-circle" style="max-height: 40px;">
            </span>
            <span class="col-4 font-weight-bold">
                <a href="/profile/{{$news->user->id}}">
                    <span class="text-dark">{{$news->user->username}}</span>
                </a>
            </span>
            <div class="col-8">
                <div>{{$news->user->bio}}</div>
            </div>
        </div>

    </div>
</div>
@endsection
