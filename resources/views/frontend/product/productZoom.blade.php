@extends('layouts.app')

@section('content')

    <div class="main">
        <div class="container py-5">
            <h2 class="pb-2 border-bottom" style="text-align: center; font: bold 54px  'Brush Script MT'">{{_t('Good apetite')}}!</h2>
            <div class="card card-solid">
                <div class="card-body">
                    <div class="flex-column d-flex">
                        <div class="col-12">
                            <div class="">
                                <img src="{{ $product->image }}" class="product-image img-thumbnail w-50"
                                     alt="Product Image">
                            </div>

                            {{--                            <div class="col-12 product.js-image-thumbs">--}}
                            {{--                                <div class="product.js-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>--}}
                            {{--                                <div class="product.js-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>--}}
                            {{--                                <div class="product.js-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>--}}
                            {{--                                <div class="product.js-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>--}}
                            {{--                                <div class="product.js-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="d-flex mt-2">
                            <div class="col-3">
                                <p class="text fw-bolder text-center"
                                   style="text-align: center; font: bold 34px  'Brush Script MT'">{{ $product->name }}</p>
                            </div>
                            <div class="col-2">
                                <p class="text fw-bolder"
                                   style="text-align: center;color: red;font: bold 34px  'Brush Script MT'">{{ $product->price }}
                                    Euro</p>
                            </div>

                            {{--                            <div class="product__qty"><span class="product__qty-text">Количество, шт.:</span>--}}
                            {{--                                <div class="product__qty-counter">--}}
                            {{--                                    <button type="button" class="btn__counter btn__minus">-</button>--}}
                            {{--                                    <input type="number" name="product.js[qty]" value="1" class="input__counter">--}}
                            {{--                                    <button type="button" class="btn__counter btn__plus">+</button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="">{{_t('Quantity')}}: <input type="number" min="1" id="product_quantity" name="productOrder[quantity]"
                                                 class="form-control " value="1">
                            </div>


                            <div class="col-4 d-flex justify-content-end p-3">
                                <button type="submit" class="btn btn-primary btn-circle">
                                    <i class="fas fa-shopping-basket"></i>
                                    Buy
                                </button>
                                <button class="btn-danger btn btn-circle">
                                    <a href="{{ route('frontend.getMenu') }}" class="nav-link text-white">
                                        <i class="fas fa-backward"></i>
                                        {{_t('Back to menu')}}Back to menu
                                    </a>

                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <nav class="w-100">
                            <div class="nav nav-tabs mt-2">
                                <p class="text fw-bolder text-center">{{_t('Description')}}:</p>
                            </div>
                        </nav>

                        <div>
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in
                            faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at
                            efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed
                            rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh,
                            congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis.
                            Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus.
                            Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida
                            velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque
                            justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante.
                            Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non
                            convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id
                            enim a erat fringilla sollicitudin ultrices vel metus.
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>


    <div class=" container-fluid"
         style="background-image:
                                url('https://thumbs.dreamstime.com/b/flat-lay-peoples-hands-homemade-soup-bread-slices-people-eating-autumn-winter-creamy-vegan-soups-over-white-table-209137970.jpg');
                                height: 320px; background-repeat: no-repeat; background-size: cover">
    </div>

    {{--    <div class="htmlOut row p-5" style="background-color: wheat">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row htmlInner mb-5"></div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
