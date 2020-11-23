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
            <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-xs-offset-4">
                <h1>Sign In</h1>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error  }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('user.signin')  }}" method="post">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    {{ csrf_field() }}
                </form>
                <p>Don't have an account? <a href="{{ route('user.signup') }}">Sign up</a></p>
            </div>
        </div>
    </div>
@endsection