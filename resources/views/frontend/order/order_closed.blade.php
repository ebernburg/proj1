@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/cart.css">
@endsection


@section('custom_js')
    <script src="/storage/js/frontend/cart.js"></script>

@endsection

@section('content')

    <div class="cart_info">
        <div class="container">
            <div class="text text-center text-info" style="font-size: 34px">Thank you!Your order is coming soon!</div>
            <div class="row">
                <div class="col">
                    <img src="/storage/photos/1/food-delivery.jpg" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>

@endsection

