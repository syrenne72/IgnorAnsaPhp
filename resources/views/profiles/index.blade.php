<!-- contiene il menu e gli altri elementi comuni a tutte le pagine -->
@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('notifica'))
        <div class="alert alert-success">
            {{ session('notifica') }}
        </div>
        @php
          {{ session()->forget('notifica'); }}
        @endphp
    @endif

    <div class="row">
        <div class="col-3 p-3">
            <img src="{{$user->profileImage()}}"
            style="width: 100%" class="rounded-circle">
        </div>
        <div class="col-4 p-3">
            <span class="font-weight-light" style="font-size: 25px;">{{$user->nome}}</span>

            {{-- Modifica profilo utente --}}
            @can('update', $user)
                <a href="/profile/{{$user->id}}/edit" style="font-size: x-small; padding-left: 5px;">edit</a>
            @endcan
            {{--            --}}

            <div class="pt-2">{{$user->bio}}</div>
            <div class="pt-2 text-monospace" style="font-size: 12px;">{{$user->email}}</div>
            <div class="pt-2">Notizie pubblicate: {{$user->news->count()}}</div>

            @can('update', $user)
                <div class="pt-2"> <a href="/n/create">Aggiungi una news</a></div>
            @endcan

        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->news as $news)
            <div class="col-4 pb-4">
                <a href="/n/{{$news->id}}">
                    <img src="/storage/{{$news->foto}}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
