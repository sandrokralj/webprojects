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

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h1>Оплата</h1>
                <h4>Your Total: {{ $total }} грн</h4>
                <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
                    {{ Session::get('error') }}
                </div>

                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" required name="name">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" class="form-control" required name="address">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">Card Holder Name</label>
                                <input type="text" id="card-name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-name">Card Holder Number</label>
                                <input type="text" id="card-number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="card-expiry-month">Expiration Month</label>
                                        <input type="text" id="card-expiry-month" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="card-expiry-year">Expiration Year</label>
                                        <input type="text" id="card-expiry-year" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-cvc">CVC</label>
                                <input type="text" id="card-cvc" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success">Buy now</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::to('src/js/stripe.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('src/js/checkout.js')}}"></script>
@endsection