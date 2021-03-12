@extends('layouts.menubar')

@section('content')

<!-- Copertina -->

{{-- Assegnazione (si può fare meglio) --}}
{{-- Prendo le ultime 5 notizie e le memorizzo in un array --}}
{{-- Memorizzo le chiavi per l'accesso in keys --}}
@if($copertina = $news->findAllDesc()->take(5)->all())@endif
@if($keys = array_keys($copertina))@endif
{{-- --}}

<div class="container-fluid-copertina paddding mb-5">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <div class="fh5co_suceefh5co_height"><img src="/storage/{{$copertina[$keys[0]]->foto}}" alt="img"/>
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$copertina[$keys[0]]->data()}}
                        </a></div>
                    <div class=""><a href="/journal/{{$copertina[$keys[0]]->id}}" class="fh5co_good_font"> "{{$copertina[$keys[0]]->titolo}}" </a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                @for($i = 1; $i < 5; $i++)
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="/storage/{{$copertina[$keys[$i]]->foto}}" alt="img"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$copertina[$keys[$i]]->data()}}
                                        28,2017 </a></div>
                                <div class=""><a href="/journal/{{$copertina[$keys[$i]]->id}}" class="fh5co_good_font_2"> "{{$copertina[$keys[$i]]->titolo}}" </a></div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
{{-- --}}

{{-- Trending --}}
@if($trending = $news->findAll()->sortByDesc('visualizzazioni')->take(5)->all())@endif

<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">

            @foreach($trending as $tr)
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="/storage/{{$tr->foto}}" alt=""
                                                               class="fh5co_img_special_relative"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="/journal/{{$tr->id}}" class="text-white"> {{$tr->titolo}} </a>
                        <div class="fh5co_latest_trading_date_and_name_color"> {{$tr->data()}} </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
{{-- --}}


{{-- News --}}
@if($attualita = $news->findByCategory('attualita'))@endif

<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">

            @foreach($attualita as $at)
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="/storage/{{$at->foto}}" alt=""/></div>
                    <div>
                        <a href="/journal/{{$at->id}}" class="d-block fh5co_small_post_heading"><span class="">{{$at->titolo}}</span></a>
{{--                        <div class="c_g"><i class="fa fa-clock-o"></i>{{$at->data()}}</div>--}}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
{{-- --}}

{{-- Salute --}}
@if($salute = $news->findByCategory('medicina'))@endif

<div class="container-fluid fh5co_video_news_bg pb-4">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4">Salute</div>
        </div>
        <div>
            <div class="owl-carousel owl-theme" id="slider3">

                @foreach($salute as $at)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="/storage/{{$at->foto}}" alt=""/></div>
                            <div>
                                <a href="/journal/{{$at->id}}" class="d-block fh5co_small_post_heading"><span class="">{{$at->titolo}}</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- --}}

<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">

            {{-- Flash news --}}
            @if($flash = $news->findByCategory('flash'))@endif

            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Flash news</div>
                </div>

                @for($i = 0; $i < 4; $i++)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="/storage/{{$flash[$i]->foto}}" alt=""/></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="/journal/{{$flash[$i]->id}}" class="fh5co_magna py-2">{{$flash[$i]->titolo}}</a> <a href="single.html" class="fh5co_mini_time py-3"> {{$flash[$i]->descrizione}}</a>
                            <div class="fh5co_consectetur overflow-hidden">
                                {{$flash[$i]->articolo}}
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
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
            </div>
        </div>
    </div>
</div>

@endsection
