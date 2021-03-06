@extends('layouts.menubar')

@section('content')

@if(\App\Models\News::newView($news->id))@endif
<div class="row pt-4 ml-5 mr-5 align-items-center" style="background-color: rgba(239,239,239,0.42)">
    <div class="col-2">
        <img class="rounded-circle" src="/storage/{{$news->foto}}" alt="image" style="width: 200px;">
    </div>
    <div class="col-6">
        <div class="font-weight-light">January 1, 2018</div>
        <div class="font-weight-bold h1">{{$news->titolo}}</div>
        <div class="font-weight-normal h4">{{$news->descrizione}}</div>
    </div>
</div>

<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">

            <!-- Articolo -->
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <p>
                    {{$news->articolo}}
                </p>
            </div>
            <!-- -->

            <!-- News Popolari -->
            @if($trending = $news->findMostPopular()->take(5)->all())@endif
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">News Popolari</div>
                </div>

                @foreach($trending as $tr)
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="/storage/{{$tr->foto}}" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font">{{$tr->titolo}}</div>
                        <div class="most_fh5co_treding_font_123">{{$tr->data()}}</div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- -->

        </div>
    </div>
</div>

@endsection
