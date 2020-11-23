@extends('layouts.master')
@section('title')
    Bazan Shop
@endsection
@section('styles')

    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">
@endsection
@section('header')
    @include('partials.header')
@endsection
@section('content')
    <div class="container theme-showcase" role="main" id="main-image">
        <section>
            @foreach($images as $image)
            <div class="mySlides img-responsive" style="background: url({{URL::to($image->path)}});
                    background-size: cover;background-position: 50%;height: 100vh;">
                <div class="gradient" style="opacity: 0.8;
                background: linear-gradient(black,rgba(0,0,0,0));width: 100%;height: 20%;"></div>
            </div>
            <div class="mySlides-title jumbotron" style="color: {{ $image->color }};" id="slogan">{{ $image->title }}</div>
            @endforeach
        </section>

    </div>
    <div class="menu-container container">
        <div class="row">
            @for($i=0,$n=$num;$i<$n;$i++,$num--)
                @if($num==1 || $num==2)
                    @if($n%2==0 && $n%3==0)<div class="menu-image col-xs-6 col-sm-4 ">@endif
                    @if($n%2==0 && $n%3==1 && $num==2)
                        <div class="menu-image col-xs-6 col-sm-4">
                    @endif
                    @if($n%2==0 && $n%3==1 && $num==1)
                        <div class="menu-image col-xs-6 col-sm-4 col-sm-push-4">
                    @endif
                    @if($n%2==0 && $n%3==2)<div class="menu-image col-xs-6 col-sm-4 col-sm-push-2">@endif
                    @if($n%2!=0 && $n%3==0 && $num==1)
                        <div class="menu-image col-xs-6 col-sm-4 col-xs-push-3 col-sm-push-0 ">
                    @endif
                    @if($n%2!=0 && $n%3==0 && $num==2)
                        <div class="menu-image col-xs-6 col-sm-4 col-xs-push-0 col-sm-push-0 ">
                    @endif
                    @if($n%2!=0 && $n%3==1 && $num==1)
                        <div class="menu-image col-xs-6 col-sm-4 col-xs-push-3 col-sm-push-4">
                    @endif
                    @if($n%2!=0 && $n%3==2 && $num==2)
                        <div class="menu-image col-xs-6 col-sm-4 col-sm-push-2">
                    @endif
                    @if($n%2!=0 && $n%3==2 && $num==1)
                        <div class="menu-image col-xs-6 col-sm-4 col-xs-push-3 col-sm-push-2">
                    @endif
                @else <div class="menu-image col-xs-6 col-sm-4 ">
                @endif
                <div class="divimage">
                    <a href="{{ route('product.index', ['name' => $categories[$i]->name]) }}">
                        <img src="{{URL::to($categories[$i]->imagePath)}}" class="img-responsive">
                        <div class="jumbotron">{{ $categories[$i]->title }}</div>
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </div>

    @foreach($blocks as $block)
        @if($block->background == null)
        <div class="container block-container" id="{{ $block->name }}" style="background-color: {{ $block->color }};">

        @else
        <div class="container block-container" id="{{ $block->name }}" style="background: url({{URL::to($block->background)}}) repeat;background-size: cover;">

        @endif
        <div class="block-opacity">
                <div class="title-block">
                    <h1>{{ $block->title }}</h1>
                </div>
                <div class="block-row row">
                    <div class="block-text col-md-4 col-sm-8 col-md-push-1">{{ $block->text }}</div>
                    <div class="col-md-4 col-sm-4 col-md-push-3">
                        <div class="row" >
                            {{ $block->item }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script src="{{URL::to('src/js/main.js')}}"></script>
@endsection