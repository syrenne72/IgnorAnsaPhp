<!-- contiene il menu e gli altri elementi comuni a tutte le pagine -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($news->findAll() as $single_news)
            <div>{{$single_news->titolo}}</div>
        @endforeach
    </div>
</div>
@endsection
