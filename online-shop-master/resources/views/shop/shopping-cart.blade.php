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
    @if(Session::has('cart') && Session::get('cart')->totalQty != 0)
        <div class="container" style="padding-top:20px;padding-bottom:20px;background: rgba(255,255,255,0.3);">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">

                                <div class="badge" style="margin-top:30px;">{{ $product['qty'] }}</div>

                                <img src="{{URL::to($product['item']['imagePath1'] )}}" alt="dress" style="height: 80px;">
                                <strong style="display:inline-block;width:200px;vertical-align:middle;">{{ $product['item']['title'] }}</strong>
                                <span class="label label-success">{{ $product['price'] }} Ð³Ñ€Ð½</span>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-xs " data-toggle="dropdown">Action
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('product.reduceByCart', ['id' => $product['item']['id'] ]) }}">Reduce by 1</a></li>
                                        <li><a href="{{ route('product.reduceAllByCart', ['id' => $product['item']['id'] ]) }}">Reduce All</a></li>
                                        <li><a href="{{ route('product.addByCart', ['id' => $product['item']['id'] ]) }}">Add 1</a></li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <strong>Total: {{ $totalPrice }} Ð³Ñ€Ð½</strong>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <a href="{{ route('checkout') }}" type="button" class="btn btn-success">ÐžÐ¿Ð»Ð°Ñ‚Ð°</a>
                </div>
                <div class="col-sm-6 col-md-6 col-md-offset-6 col-sm-offset-6">
                    <a href="{{ $oldUrl }}" type="button" class="btn btn-success">ÐžÐ¿Ð»Ð°Ñ‚Ð°</a>
                </div>
            </div>
        </div>
    @else
        <div class="container"  style="padding-top:20px;padding-bottom:20px;background: rgba(255,255,255,0.3);">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 text-center">
                    <h2>No Items in Cart!</h2>
                </div>
            </div>
        </div>
    @endif
@endsection