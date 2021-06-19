@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/whole_order.css">
    {{--    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/cart_responsive.css">--}}
@endsection

@section('custom_js')
    <script src="/storage/js/frontend/my_orders.js"></script>
    <script>
        function print_page() {
            $('body').css('visibility','hidden');
            $('.print').css('visibility','visible');
            window.print();
            $('body').css('visibility','visible');
        }
    </script>

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
                                        <li>{{_t('Whole order')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mt-4" style="margin-right: 10%">
        <button onClick="print_page()" title="Print this page" style="border: none"><img src="/storage/photos/1/print_page.png" alt="" width="45px">Print this page</button>
    </div>
    <!-- Cart Info -->

    <div class="cart_info print">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_order">{{_t('Order')}}</div>
{{--                        <div class="cart_info_col cart_info_col_user">{{_t('Name')}}</div>--}}
                        <div class="cart_info_col cart_info_col_product">{{_t('Product')}}</div>
                        <div class="cart_info_col cart_info_col_price">{{_t('Price')}}</div>
                        <div class="cart_info_col cart_info_col_quantity">{{_t('Quantity')}}</div>
                        <div class="cart_info_col cart_info_col_total">{{_t('Total')}}</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col">

                    @foreach($whole_order as $order)

                        <p> {{_t('Date')}}: {{ $order->created_at }}</p>
                        <p> {{_t('Name')}}: {{ App\Models\User::find($order->user_id)->name}}</p>
                        @foreach($order->product as $item)

                        <!-- Cart Item -->
                            <div class="cart_info_columns1 clearfix">
                                <div class="cart_info_col cart_info_col_order">&nbsp</div>
                                <div class="cart_info_col cart_info_col_product">{{$item->title}}</div>
                                <div class="cart_info_col cart_info_col_price">{{$item->price}} Euro</div>
                                <div class="cart_info_col cart_info_col_quantity">{{$item->quantity}}</div>
                                <div class="cart_info_col cart_info_col_total">{{$item->price*$item->quantity}} Euro</div>
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


