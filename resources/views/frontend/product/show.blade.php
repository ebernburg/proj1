@extends('layouts.app')


@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/product.css">
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/product_responsive.css">
    <style>

        /*<!-- modal window-->*/
        .popup-fade {
            display: none;
        }
        .popup-fade:before {
            content: '';
            background: #000;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0.7;
            z-index: 9999;
        }
        .popup {
            position: fixed;
            top: 20%;
            left: 50%;
            padding: 20px;
            width: 560px;
            margin-left: -200px;
            background: #fff;
            border: 1px solid orange;
            border-radius: 4px;
            z-index: 99999;
            opacity: 1;
        }
        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
@endsection

@section('custom_js')

        <script src="/storage/js/frontend/product.js"></script>
{{--        <script src="/storage/js/frontend/product.js"></script>--}}
{{--    // <link rel="stylesheet" href="/admin_mix/plugins/fontawesome-free/css/all.min.css">--}}
        <script>
        $(document).ready(function () {
            $('.cart_button').click(function (event) {
                event.preventDefault()
                addModal()
                setTimeout(addToCart, 500)
               //addToCart()
            })
        })

        function addModal() {

            var that = $('.details_image_large');
            // var that = $('.product_quantity_container');
            var bascket = $('.shop-cart');
            bascket.css('backgroundColor','red');
            var w = that.width();
            console.log(that);
            console.log(bascket);
            console.log(w);
            that.clone()
                .css({'width' : w,
                    'position' : 'absolute',
                    'z-index' : '9999',
                    top: that.offset().left,
                    left:that.offset().top})
                .appendTo("body")
                .animate({opacity: 0.05,
                    left: bascket.offset()['left']+50,
                    top: bascket.offset()['top']+50,
                    width: 20}, 1000, function() {
                    $(this).remove();
                });
            }


        function addToCart() {
            let id = $('.details_name').data('id')
            let qty = parseInt($('#quantity_input').val())
            let total_qty = parseInt($('.cart-qty').text())
            total_qty += qty
            $('.cart-qty').text(total_qty)
            //$: uniqid = uniqid(12);
           // document.cookie = "cart_id=" + uniqid; expires="15/02/2022 00:00:00";
            //console.log(uniqid)
           // alert(1)
            $.ajax({
                url: "{{route('frontend.addToCart')}}",
                type: "POST",
                data: {
                    id: id,
                    qty: qty,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    //alert(2)
                    getModalWindow();
                    {{-- $('.innerhtml').append('<div class="alert alert-success alert-dismissible">  <strong>Success!</strong> Product a successful added to the cart. </div>')--}}
                    {{--setTimeout(function(){--}}
                    {{--    window.location.href = '{{ route("frontend.getMenu") }}';--}}
                    {{--}, 1000);--}}
                },
                error: (data) => {
                    console.log(data)
                }
            });
        }
    </script>
        <script>
            function uniqid(length){
                var dec2hex = [];
                for (var i=0; i<=15; i++) {
                    dec2hex[i] = i.toString(16);
                }

                var uuid = '';
                for (var i=1; i<=36; i++) {
                    if (i===9 || i===14 || i===19 || i===24) {
                        uuid += '-';
                    } else if (i===15) {
                        uuid += 4;
                    } else if (i===20) {
                        uuid += dec2hex[(Math.random()*4|0 + 8)];
                    } else {
                        uuid += dec2hex[(Math.random()*16|0)];
                    }
                }

                if(length) uuid = uuid.substring(0,length);
                return uuid;
            }
        </script>

        <script>
            function getModalWindow() {
                $('.popup-fade').fadeIn();
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
            }
        </script>
@endsection

@section('content')
    <!-- Home -->

    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image: url('/storage/photos/1/bg_cart.jpg');"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <!-- breadcrumbs-->
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="{{ route('frontend.home') }}">{{_t('Home')}}</a></li>
                                        <li>{{_t('Add to Card')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal window -->
    <div class="popup-fade">
        <div class="popup">
            <a class="popup-close" href="#"><i class="fas fa-times"></i></a>
            <h3 style="color: green">{{_t('Your product added to the cart')}}</h3>
                    <button class="btn btn-info text-white"><a style="color: white" href="{{route('frontend.cart')}}">{{_t('to Cart')}}</a></button>
                    <button class="btn btn-danger text-white"><a style="color: white" href="{{route('frontend.getMenu')}}">{{_t('to Menu')}}</a></button>
        </div>
    </div>
    <!-- ./Modal window -->

    <!-- Product Details -->

    <div class="product_details" style="min-height: 600px">
        <div class="container containers">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        @php
                            $image = '';
                            if(isset($product->image) ){
                                $image = $product->image;
                            } else {
                                $image = 'photos/1/no_image.png';
                            }
                        @endphp

{{--                        <div class="details_image_large"><img src="/images/{{$image}}" alt="{{$item->title}}">
                                <div class="product_extra product_new">
                                    <a href="categories.html">New</a>
                                </div>
                            </div>--}}
{{--                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">--}}
{{--                            @if($image == 'no_image.png')--}}

{{--                            @else--}}
{{--                                @foreach($item->images as $img)--}}
{{--                                    @if($loop->first)--}}
{{--                                        <div class="details_image_thumbnail active" data-image="/images/{{$img['img']}}"><img src="/images/{{$img['img']}}" alt="{{$item->title}}"></div>--}}
{{--                                    @else--}}
{{--                                        <div class="details_image_thumbnail" data-image="/images/{{$img['img']}}"><img src="/images/{{$img['img']}}" alt="{{$item->title}}"></div>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </div>--}}

                        <div class="details_image_large">
                            <img src="{{$product->image}}" alt="{{$product->name}}" width="100%">
                        </div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name" data-id="{{$product->id}}"><span>{{$product->name}}</span></div>
                        @if($product->new_price != null)
                            <div class="details_discount"><span style="font: 18px bold; color: red">{{$product->price}} Euro</span></div>
{{--                            <div class="details_price">${{$product->new_price}}</div>--}}
                        @else
                            <div class="details_price"><span style="font: 18px bold; color: red">{{$product->price}} Euro</span></div>
                        @endif

                    <!-- In Stock -->
                                                <div class="in_stock_container">
                                                    <div class="availability">{{_t('Availability')}}:</div>
                                                    @if($product->status == 1)
                                                        <span style="color: green">{{_t('In Stock')}}</span>
                                                    @else
                                                        <span style="color: #cc0000">{{_t('Unavailable')}}</span>
                                                    @endif
                                                </div>

                        <div class="description_title">{{_t('Description')}}:</div>
                        {{--                            <p>{{$product.js->description}}</p>--}}
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam ea natus quidem sed
                            sequi sunt voluptatibus. A aliquid atque autem consectetur culpa ducimus eius facilis fugit
                            illo in incidunt ipsa ipsam laudantium, libero magnam minus nam natus nesciunt odio officiis
                            perspiciatis placeat quaerat quia quibusdam quis quisquam quo reiciendis rem repudiandae
                            sequi similique sint tempore vitae. Amet enim hic quas? Dolores dolorum eaque eveniet fugiat
                            ipsa qui! Corporis ea eum id illo ipsam labore minima sequi tempora tenetur veniam!</p>
                    </div>
                    <div class="innerhtml"></div>
                    <!-- Product Quantity -->
                    <div class="product_quantity_container">
                        <div class="product_quantity clearfix">
                            <span>Qty</span>
                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                        class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                        class="fa fa-chevron-down" aria-hidden="true"></i></div>
                            </div>
                        </div>
                        <!-- Button click-->
                        <div class="button cart_button"><a href="#">{{_t('Add to cart')}} </a></div>

                    </div>

                    <!-- Share -->
                    <div class="details_shar mt-2">
                        <span>Share:</span>

                        <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->
@endsection
