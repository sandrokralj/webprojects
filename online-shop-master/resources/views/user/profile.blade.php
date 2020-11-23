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
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-xs-offset-4 text-center">
                <h1>User Profile</h1>

            </div>
        </div>
    </div>
@endsection