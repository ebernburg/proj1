@extends('layouts.app')

{{--@section('content')--}}

{{--    <div class="main">--}}
{{--        <div class="container py-5">--}}
{{--            <h2 class="pb-2 border-bottom" style="text-align: center;">Cart</h2>--}}
{{--            <h4>Choose category</h4>--}}

{{--                    <form action="#" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--        <!-- Select -->--}}
{{--            <select class="form-select" id="category">--}}
{{--                @foreach($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--                        </form>--}}
{{--        </div>--}}
{{--@section('custom_js')--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        let quantity = $('.quantity_input_cart').val();--}}
{{--        let price = $('.price_val').val();--}}
{{--        console.log(quantity);--}}
{{--        console.log(price);--}}
{{--    })--}}
{{--</script>--}}
{{--@endsection--}}




@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/my_orders.css">
    {{--    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/cart_responsive.css">--}}
@endsection


@section('custom_js')
    <script src="/storage/js/frontend/my_orders.js"></script>


@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background">
            </div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="{{route('frontend.home')}}">{{_t('Home')}}</a></li>
                                        <li>{{_t('My orders')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Info -->

    <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_order">{{_t('Order')}}</div>
                        <div class="cart_info_col cart_info_col_product">{{_t('Product')}}</div>
                        <div class="cart_info_col cart_info_col_price">{{_t('Price')}}</div>
                        <div class="cart_info_col cart_info_col_quantity">{{_t('Quantity')}}</div>
                        <div class="cart_info_col cart_info_col_total">{{_t('Total')}}</div>
                    </div>
                </div>
            </div>

            <div class="row cart_items_row">
                <div class="col">

                    @foreach($orders as $order)

                        <p> {{_t('Date')}}: {{ $order->created_at }}</p>
                        @foreach($order->product as $item)

                        <!-- Cart Item -->
                            <div
                                class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                                <!-- Name -->
                                <div
                                    class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_item_image">
                                        <div><img src="{{$item->product->image}}" alt=""></div>
                                    </div>
                                    <div class="cart_item_name_container">
                                        <div class="cart_item_name">{{$item->title}}<a
                                                href="#">{{$item->title}}</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Price -->
                                <div class="cart_item_price price_val"><span
                                        class="product_price">{{$item->price}}</span> Euro
                                </div>
                                <!-- Quantity -->
                                <div class="cart_item_quantity">
                                    <div>
                                        <span>{{$item->quantity}}</span>
                                    </div>
                                </div>
                                <!-- Total -->
                                <div class="cart_item_total"><span
                                        class="sum">{{$item->price*$item->quantity}}</span>
                                    Euro
                                </div>

                            </div>
                        @endforeach
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_total_title">{{_t('Total')}}:</div>
                                    <div class="cart_total_value ml-auto"><span
                                            class="total" style="color: red">{{\App\Models\Order::getTotalPrice($order->id)}}</span>
                                        Euro
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <hr style="color: red">
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

