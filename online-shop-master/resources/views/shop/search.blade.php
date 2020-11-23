@extends('layouts.master')
@section('title')
    Bazan Shop
@endsection
@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/category.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">

@endsection
@section('header')
    @include('partials.header')
@endsection
@section('content')
    <div class="container" style="background: rgba(255,255,255,0.3);">
        <h1 class="text-center">Search Results</h1>
        @if(!$search)
            <p>Nothing found, please try a different search.</p>
        @else
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-xs-offset-2">
                    <ul class="list-group">
                        @foreach($search as $item)
                            <li class="list-group-item">

                                <a href="{{ route('product.item', ['id' => $item->id ]) }}" style="text-decoration: none;color:black;">
                                    <img src="{{URL::to($item->imagePath1 )}}" alt="dress" style="height: 80px;">
                                    <strong class="text-center">{{ $item->title }}</strong>
                                    <div class="badge" style="float:right;margin-top:30px;">{{ $item->price }} грн</div>
                                </a>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </div>
@endsection