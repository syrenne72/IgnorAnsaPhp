@extends('layouts.menubar')

@section('content')

{{-- Trending --}}
@if($trending = $news->findByCategoryPopular('medicina'))@endif
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">

            @for($i = 0; $i < 10; $i++)
                @if($i < count($trending))
                <div class="item px-2">
                    <div class="fh5co_latest_trading_img_position_relative">
                        <div class="fh5co_latest_trading_img"><img src="/storage/{{$trending[$i]->foto}}" alt=""
                                                                   class="fh5co_img_special_relative"/></div>
                        <div class="fh5co_latest_trading_img_position_absolute"></div>
                        <div class="fh5co_latest_trading_img_position_absolute_1">
                            <a href="/journal/{{$trending[$i]->id}}" class="text-white"> {{$trending[$i]->titolo}} </a>
                            <div class="fh5co_latest_trading_date_and_name_color"> {{$trending[$i]->data()}} </div>
                        </div>
                    </div>
                </div>
                @endif
            @endfor

        </div>
    </div>
</div>
{{-- --}}

<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">

            {{-- Tutte le notizie --}}
            @if($all = $news->findByCategory('medicina'))@endif

            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Salute</div>
                </div>

                @for($i = 0; $i < count($all); $i++)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="/storage/{{$all[$i]->foto}}" alt=""/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="/journal/{{$all[$i]->id}}" class="fh5co_magna py-2">{{$all[$i]->titolo}}</a>
                            <a href="/journal/{{$all[$i]->id}}" class="fh5co_mini_time py-3"> {{$all[$i]->descrizione}}</a>
                            <div class="c_g"><i class="fa fa-clock-o"></i>{{$all[$i]->data()}}</div>
                            <div class="fh5co_consectetur overflow-hidden">
                                {{$all[$i]->articolo}}
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
{{--            --}}

{{--            Tag --}}
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tag</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <a href="#" class="fh5co_tagg">News</a>
                    <a href="#" class="fh5co_tagg">Salute</a>
                    <a href="#" class="fh5co_tagg">Sport</a>
                    <a href="#" class="fh5co_tagg">Flash News</a>
                    <a href="#" class="fh5co_tagg">Arte</a>
                    <a href="#" class="fh5co_tagg">Mondo animale</a>
                    <a href="#" class="fh5co_tagg">Spettacolo</a>
                    <a href="#" class="fh5co_tagg">Lifestyle</a>
                    <a href="#" class="fh5co_tagg">Educazione</a>
                    <a href="#" class="fh5co_tagg">Social</a>
                    <a href="#" class="fh5co_tagg">Politica</a>
                </div>
{{--                --}}

{{--                Popolari --}}
                @if($trending = $news->findMostPopular()->take(5)->all())@endif

                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Popolari</div>
                </div>

                @foreach($trending as $at)
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="/storage/{{$at->foto}}" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> {{$at->titolo}} </div>
                        <div class="most_fh5co_treding_font_123"> {{$at->data()}} </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
