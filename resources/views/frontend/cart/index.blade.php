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
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/cart.css">
    {{--    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/cart_responsive.css">--}}
@endsection


@section('custom_js')
    <script src="/storage/js/frontend/cart.js"></script>

        <script>
            $('.buy_button').hover(
                function() {
                    $( this ).addClass('buy_hover');
                }, function() {
                    $( this ).removeClass('buy_hover');
                }
            );
        </script>

    <script>
        $('.quantity_inc').on('click', function () {
            // alert(1)
            event.preventDefault()
            let block = $(this).closest("div.cart_item"); //parent div
            let qty = $(this).closest("div.cart_item").find("input.quantity").val(); // quantity
            console.log(qty)
            let id = $(this).closest("div.cart_item").find("input.productId").val(); // id product
            qty = parseInt(qty) + 1;
            block.find("input.quantity").val(qty);   //add new quantity after buttom click
            $.ajax({
                type: 'post',
                url: '{{route("frontend.cart_add")}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    qty: qty,
                },
                dataType: "json",
                success: function (data) {
                    //alert(1)
                    //console.log(data);
                    //console.log(data.priceSum);
                    //console.log(data.totalSubSum);
                    //console.log(data.badgeProductsHeader);
                    let price = block.find(".product_price").html(); //price of product
                    //  let total = (asd*qty).toFixed(2);
                    // console.log(total)
                    //   block.find(".sum").html(total);
                    block.find(".sum").html(data.priceSum); // quantity * price(new)
                    let fieldTotalSum = $('.total').html(data.totalSubSum);  //total sum
                    $('.new_qty').html(data.badgeProductsHeader); //update quantity of products in header
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    </script>

    <script>
        $('.quantity_dec').on('click', function () {
            event.preventDefault()
            let block = $(this).closest("div.cart_item"); //parent div
            let qty = $(this).closest("div.cart_item").find("input.quantity").val(); // quantity
            // console.log(qty)
            let id = $(this).closest("div.cart_item").find("input.productId").val(); // id product
            qty = parseInt(qty) - 1;
            block.find("input.quantity").val(qty);  //add new quantity after buttom click
            $.ajax({
                type: 'post',
                // url: '/ProductAjaxResponsePost',
                url: '{{route("frontend.cart_reduce")}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    qty: qty,
                },
                dataType: "json",
                success: function (data) {
                    //console.log(data);
                    console.log(data.priceSum);
                    console.log(data.totalSubSum);
                    console.log(data.badgeProductsHeader);
                    let price = block.find(".product_price").html(); //price of product
                    //  let total = (asd*qty).toFixed(2);
                    // console.log(total)
                    //   block.find(".sum").html(total);
                    block.find(".sum").html(data.priceSum); // quantity * price(new)
                    let fieldTotalSum = $('.total').html(data.totalSubSum);  //total sum
                    $('.new_qty').html(data.badgeProductsHeader); //update quantity of products in header
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    </script>

    <script>
        $('.itemRemove').on('click', function () {
            event.preventDefault()
            //alert(1)
            let block = $(this).closest("div.cart_item"); // div for product
            let id = $(this).closest("div.cart_item").find("input.productId").val(); // id product
            $.ajax({
                type: 'post',
                url: '{{route("frontend.cart_removeItem")}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                },
                dataType: "json",
                success: function (data) {
                    console.log(data.totalSubSum);
                    console.log(data.badgeProductsHeader);
                    //block.find(".sum").html(data.priceSum); // quantity * price(new)
                    let fieldTotalSum = $('.total').html(data.totalSubSum);  //total sum
                    $('.new_qty').html(data.badgeProductsHeader); //update quantity of products in header
                    block.remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        })
    </script>

    <script>
        $(document).ready(function ($) {
            $('.sign_for_order').click(function () {
                $('.popup-fade').fadeIn();
                return false;
            });

            $('.popup-close').click(function () {
                $(this).parents('.popup-fade').fadeOut();
                $('.link-visible').css('visibility', 'visible');
                return false;
            });

            $(document).keydown(function (e) {
                if (e.keyCode === 27) {
                    e.stopPropagation();
                    $('.popup-fade').fadeOut();

                }
            });

            $('.popup-fade').click(function (e) {
                if ($(e.target).closest('.popup').length == 0) {
                    $(this).fadeOut();
                    $('.link-visible').css('visibility', 'visible');
                }
            });
        });
    </script>

    {{--    <script>--}}
    {{--        $('.modal').mouseup(function (e) {--}}
    {{--            let modalContent = $(".modal__content");--}}
    {{--            if (!modalContent.is(e.target) && modalContent.has(e.target).length === 0) {--}}
    {{--                $(this).removeClass('modal_active');--}}
    {{--            }--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            {{--            <div class="home_background" style="background-image: url('https://img5.goodfon.ru/wallpaper/nbig/f/75/pomidory-tomaty-kompozitsiia-chernyi-fon-temnyi-fon.jpg'); min-height: 320px; background-repeat: no-repeat; background-size: cover">--}}

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
                                        <li>{{_t('')}}Shopping Cart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(\Cart::session(($_COOKIE['cart_id']))->isEmpty())
        <div class="cart_info">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Column Titles -->
                        <div class="cart_info_columns clearfix">
                            <div class="cart_info_col cart_info_col_product">{{_t('Product')}}</div>
                            <div class="cart_info_col cart_info_col_price">{{_t('Price')}}</div>
                            <div class="cart_info_col cart_info_col_quantity">{{_t('Quantity')}}</div>
                            <div class="cart_info_col cart_info_col_total">{{_t('Total')}}</div>
                        </div>
                    </div>
                </div>
                <div class="row cart_items_row">
                    <div class="col">
                        <!-- Cart Item -->

                    </div>
                </div>

                <div class="row row_extra">
                    <div class="col-lg-4">

                    </div>
                    <div class="col-lg-6 offset-lg-2">
                        <div class="cart_total">
                            <div class="section_title">{{_t('Cart is empty')}}</div>

                            <div class="cart_total_container">
                                <ul>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_total_title">{{_t('Total')}}:</div>
                                        <div class="cart_total_value ml-auto"><span class="total">0.00</span> Euro</div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <form action="{{ route("frontend.order_store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Cart Info -->

            <div class="cart_info" style="margin-bottom: 100px">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <!-- Column Titles -->
                            <div class="cart_info_columns clearfix">
                                <div class="cart_info_col cart_info_col_product">{{_t('Product')}}</div>
                                <div class="cart_info_col cart_info_col_price">{{_t('Price')}}</div>
                                <div class="cart_info_col cart_info_col_quantity">{{_t('Quantity')}}</div>
                                <div class="cart_info_col cart_info_col_total">{{_t('Total')}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row cart_items_row">
                        <div class="col">

                        @foreach($items as $row)

                            <!-- Cart Item -->
                                <div
                                    class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                                    <!-- Name -->
                                    <div
                                        class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_item_image">
                                            <div><img src="{{$row['attributes']['image']}}" alt=""></div>
                                        </div>
                                        <div class="cart_item_name_container">
                                            <div class="cart_item_name"><a
                                                    href="{{route('frontend.order_product',$row['id']) }}">{{$row['name']}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Price -->
                                    <div class="cart_item_price price_val"><span
                                            class="product_price">{{$row['price']}}</span> Euro
                                    </div>
                                    <!-- Quantity -->
                                    <div class="cart_item_quantity">
                                        <div class="product_quantity_container">
                                            <div
                                                class="product_quantity_cart product_quantity_cart clearfix">
                                                <span>Qty</span>
                                                {{--                                    <input id="quantity_input" type="text" class="quantity_input_cart quantity_val{{$loop->index}}" pattern="[0-9]*" value="{{$row['quantity']}}">--}}
                                                <input type="text" id="quantity_input_cart"
                                                       class="quantity_input_cart quantity"
                                                       name="product[{{$loop->index}}][quantity]" pattern="[0-9]*"
                                                       {{--                                                       class="quantity_input_cart quantity" name="quantity1" pattern="[0-9]*"--}}
                                                       value="{{$row['quantity']}}">


                                                <input type="hidden" class="productId"
                                                       name="product[{{$loop->index}}][product_id]"
                                                       value="{{$row['id']}}">
                                                {{--                                                <input type="hidden" name="productId" value="{{$row['id']}}">--}}


                                                <input type="hidden" name="user_id"
                                                       value="{{ \Illuminate\Support\Facades\Auth::id() }}">

                                                <div class="quantity_buttons">
                                                    <div id="quantity_inc_button_cart1"
                                                         class="quantity_inc quantity_control"><i
                                                            class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                                    <div id="quantity_dec_button_cart2"
                                                         class="quantity_dec quantity_control"><i
                                                            class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Total -->
                                    {{--                        <div class="cart_item_total sums{{$loop->index}}">{{(2*3)}}</div>--}}


                                    {{--                        <div class="cart_item_total"><span class="sum">{{($row['price'])*$row['quantity']}}</span> Euro</div>--}}
                                    <div class="cart_item_total"><span
                                            class="sum">{{\Cart::session(($_COOKIE['cart_id']))->get($row['id'])->getPriceSum()}}</span>
                                        Euro
                                    </div>

                                    <div class="" style="margin-left: 1%"><a href="" title="Delete item"><span
                                                class="itemRemove"><i class="fas fa-times"
                                                                      style="color: red"></i></span></a></div>
                                </div>
                                <hr>

                            @endforeach
                            <div class="button checkout_button checkout_button_clear"><a
                                    href="{{ route('frontend.cart_clear') }}">{{_t('Clear cart')}}</a></div>

                        </div>
                    </div>

                    <div class="row row_extra">
                        {{--            <div class="row row_extra">--}}
                        <div class="col-lg-4">

                            <!-- Delivery -->
                        {{--                    <div class="delivery">--}}
                        {{--                        <div class="section_title">Shipping method</div>--}}
                        {{--                        <div class="section_subtitle">Select the one you want</div>--}}
                        {{--                        <div class="delivery_options">--}}
                        {{--                            <label class="delivery_option clearfix">Next day delivery--}}
                        {{--                                <input type="radio" name="radio">--}}
                        {{--                                <span class="checkmark"></span>--}}
                        {{--                                <span class="delivery_price">$4.99</span>--}}
                        {{--                            </label>--}}
                        {{--                            <label class="delivery_option clearfix">Standard delivery--}}
                        {{--                                <input type="radio" name="radio">--}}
                        {{--                                <span class="checkmark"></span>--}}
                        {{--                                <span class="delivery_price">$1.99</span>--}}
                        {{--                            </label>--}}
                        {{--                            <label class="delivery_option clearfix">Personal pickup--}}
                        {{--                                <input type="radio" checked="checked" name="radio">--}}
                        {{--                                <span class="checkmark"></span>--}}
                        {{--                                <span class="delivery_price">Free</span>--}}
                        {{--                            </label>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        <!-- Coupon Code -->

                            <div
                                class="form_control mb-4"> @include('admin/_partials/select', [ 'name' => "payment_id", 'label'=>_t('Choose your payment'), 'array' => \App\Models\Payment::getForSelect()])</div>

                            <div class="form-control"><textarea name="user_comment" id="" cols="45" rows="5"
                                                                placeholder="{{_t('Write your wishes for the order')}}"></textarea>
                            </div>

                        </div>

                        <div class="col-lg-6 offset-lg-2">
                            <div class="cart_total">

                                <div class="section_title">{{_t('Cart total')}}</div>
                            {{--                            <div class="section_subtitle">Final info</div>--}}

                            <!-- Modal window -->
                                <div class="popup-fade">
                                    <div class="popup">
                                        <a class="popup-close" href="#"><i class="fas fa-times"></i></a>
                                        <h3>{{_t('Please sign or register')}}</h3>
                                        <button class="btn btn-success text-white"><a style="color: white"
                                                                                      href="{{route('login')}}">{{_t('Login')}}</a>
                                        </button>
                                        <button class="btn btn-success text-white"><a style="color: white"
                                                                                      href="{{route('register')}}">{{_t('Register')}}</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- ./Modal window -->

                            <div class="cart_total_container">
                                <ul>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_total_title">{{_t('Total')}}:</div>
                                        <div class="cart_total_value ml-auto"><span
                                                class="total">{{\Cart::session(($_COOKIE['cart_id']))->getTotal()}}</span>
                                            Euro
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @if(Auth::user())
{{--                                                                    <div class=" btn button checkout_button"><a href="#">Buy</a></div>--}}
                                <div class=""><input type="submit" class="button checkout_button buy_button"
                                                     value="{{ _t('Buy') }}">
                                </div>
{{--                                <div class="button checkout_button"><input type="submit"><a href="">Buy</a>--}}
{{--                                </div--}}
                            @else
                                <div class="button checkout_button sign_for_order"><a href="#">{{_t('Proceed to checkout')}}</a></div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
