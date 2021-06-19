@extends('layouts.app')

@section('custom.css')
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/menu.css">
@endsection


@section('content')

    <div class="mains" style="min-height: 1000px; height: auto !important;background-image:url('/images/bg_suppliers.jpg');
    background-attachment: fixed;background-repeat: no-repeat">
        <div class="container py-5 pb-2 mb-3">

            <div style='text-align: center; font: bold 84px  "Brush Script MT";color: wheat'>
                {{_t('Menu')}} <span style="font-size: 34px;"><span
                        style="color: red">{{_t('von')}}</span> {{  $currentSupplier->name }}</span>
            </div>
            <div class="container bg-white p-3" style="opacity: 0.85">
                @foreach($product_categories as $category)
                    <div class="border-bottom border m-3">
                        <div class="text-center">
                            <div class=""
                                 style='text-decoration:underline; text-align: center; font-size: 34px'>
                                {{ $category->name }} :
                            </div>
                        </div>
                        <div class="flex-row d-flex text-white flex-wrap">
                        @foreach($product_list as $product)

                            @if($product->product_category_id == $category->id)

                                <!-- item -->
                                    <div class="col-3 p-4">

                                        <div class="flex-column d-flex hover card mb-4"
                                             style=" background-image: url('/images/bg_card.jpg'); height: 210px">
                                            <a href="{{ route('frontend.order_product', $product->slug) }}">
                                                <div class="">
                                                    <div class="card-img m-2 scale" style="height: 120px"><img
                                                            class="rounded-circle"
                                                            src="{{ $product->image??'/storage/photos/1/no_image.jpg' }}"
                                                            alt="" width="90%"
                                                            height="90%">
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class=" card card-title .bg-danger text-center">
                                                    <span
                                                        style="color: black;font: 22px bold">{{ $product->name }}</span>
                                                    </div>
                                                </div>
                                                {{--                                <div class="">--}}
                                                {{--                                    <div class="card-title">--}}
                                                {{--                                        {{ $product.js->description }}--}}
                                                {{--                                    </div>--}}
                                                {{--                                </div>--}}
                                                <div class="">
                                                    <div class=" card card-title .bg-danger text-center">
                                                        <span style="color: red">{{ $product->price }} Euro</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="">
                                                <button class="btn btn__primary btn-sm">
                                                    <a href="{{ route('frontend.order_product', $product->slug) }}"
                                                       class="nav-link text-white">
                                                        <i class="fas fa-cart-arrow-down"></i>{{_t('Add to cart')}}
                                                    </a>
                                                </button>
                                            </div>


                                        </div>
                                    </div>

                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <h2 class="text-gray-dark" style="text-align: right; color:wheat; font: 44px  'Brush Script MT'">{{_t('Good appetite')}}!</h2>
        </div>
    </div>
@endsection
{{--@push('script')--}}
{{--<script>--}}
{{--    $('#qw').mouseover(function () {--}}
{{--        $(this).removeClass('border-white');--}}
{{--        $(this).addClass('border-dark');--}}
{{--    });--}}

{{--    $('#qw').mouseleave(function () {--}}
{{--        $(this).removeClass('border-dark');--}}
{{--        $(this).addClass('border-white');--}}
{{--    });--}}

{{--</script>--}}
{{--@endpush--}}
