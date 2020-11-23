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

    <div class="category-main-content container">
        <div class="category-clothes text-center">
            <h1>{{ $category->title }}</h1>
        </div>
        <div class="container item-main">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div id="myCarousel{{ $product->id }}" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel{{ $product->id }}" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel{{ $product->id }}" data-slide-to="1"></li>
                        <li data-target="#myCarousel{{ $product->id }}" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="{{URL::to($product->imagePath1 )}}" alt="dress">
                        </div>
                        <div class="item">
                            <img src="{{URL::to($product->imagePath2 )}}" alt="dress">
                        </div>
                        <div class="item">
                            <img src="{{URL::to($product->imagePath3 )}}" alt="dress">
                        </div>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel{{ $product->id }}" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel{{ $product->id }}" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="name-item">
                    <div class="price">
                        <label>{{ $product->title }}</label>
                    </div>
                </div>

                <div class="info">
                    {{ ($product->description) }}
                </div>

                <div class="price">
                    <label>{{ $product->price }} грн</label>
                </div>

                <div class="row">
                    <div class="col-xs-9 col-sm-6 item-button-view">

                    </div>
                    <div class="col-xs-12 col-sm-6 item-button-success">
                        <a href="{{ route('product.addToCart', ['id' => $product->id ]) }}" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> To cart</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="category-clothes text-center">
            <h1>Похожие товары</h1>
        </div>
        <div class="container items">


                @foreach($products->chunk(4) as $productChunk)

                        @foreach($productChunk as $product)
                    <div class="col-xs-18 col-sm-6 col-md-3 item-main text-center">
                                <div id="myCarousel{{ $product->id }}" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel{{ $product->id }}" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel{{ $product->id }}" data-slide-to="1"></li>
                                        <li data-target="#myCarousel{{ $product->id }}" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <img src="{{URL::to($product->imagePath1 )}}" alt="dress">
                                        </div>
                                        <div class="item">
                                            <img src="{{URL::to($product->imagePath2 )}}" alt="dress">
                                        </div>
                                        <div class="item">
                                            <img src="{{URL::to($product->imagePath3 )}}" alt="dress">
                                        </div>

                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel{{ $product->id }}" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel{{ $product->id }}" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class="info-item">

                                    <strong>{{$product->title}}</strong>

                                    <div class="price">
                                        <label>{{$product->price}} грн</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 item-button-view">
                                            <a href="{{ route('product.item', ['id' => $product->id]) }} " class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> View</a>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 item-button-success">
                                            <a href="{{ route('product.addToCart', ['id' => $product->id ]) }}" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> To cart</a>
                                        </div>
                                    </div>
                                </div>
                    </div>
                        @endforeach

                @endforeach



        </div>
    </div>
@endsection