@extends('layouts.app')

@section('content')

    <div class="main">
        <div class="container">
            <div id="app">

            </div>
        </div>
        @if (session('succes'))
            <div class="alert alert-success text-center">
                {{ session('succes') }}
            </div>
        @endif

        <!--Carousel start-->
        <div class="wrapper" >
            <h1 style="text-align: center">{{_t('Hello, are you hungry?')}}</h1>
            <div  class="container text-center text-danger bg-light"><h2>{{_t('Choose the dish or drink by 11 a.m. and receive an order by 12 a.m.')}}</h2></div>
            <div class="container mb-5">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
{{--                        @foreach($carousels as $carousel)--}}
{{--                            @foreach (!is_array($carousel->items)?json_decode($carousel->items, true):$carousel->items as $key => $item)--}}
{{--                        <div class="carousel-item {{$key == 0 ? 'active' : '' }} mt-5 mb-5">--}}
{{--                            <img--}}
{{--                                src="{{$item['image']}}"--}}
{{--                                class="d-block w-100" alt="...">--}}
{{--                        </div>--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                </div>
            </div>
            <!--Carousel end-->
            <!--HOW TO PLACE AN ORDER-->
            <div class="carousel-fluid mb-5">
                <section class="bg__color">

                    <div class="container">
                        <div class="container">
                            <div class="title"><h2 class="title__name">{{_t('HOW TO PLACE AN ORDER')}}</h2></div>
                            <div class="info__list">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="info__item"><p class="info__item-description">{{_t('Choose the dish and
                                                drink')}}</p></div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="info__item"><p class="info__item-description">{{_t('Sign in')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="info__item"><p class="info__item-description">{{_t('Write your wish')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="info__item"><p class="info__item-description">{{_t('Receive your order')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
            <div class="container">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">{{_t('')}}First featurette heading. <span class="text-muted">{{_t('')}}It’ll blow your mind.</span>
                        </h2>
                        <p class="lead">{{_t('')}}Some great placeholder content for the first featurette here. Imagine some
                            exciting prose here.</p>
                    </div>
                    <div class="col-md-5">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                             width="500" height="410"
                             src="/storage/photos/1/home-img2.jpg">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span>
                        </h2>
                        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea
                            of how this layout would work with some actual real-world content in place.</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                             width="500px" height="410px"
                             src="/storage/photos/1/home-img1.jpg">

                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span>
                        </h2>
                        <p class="lead">And yes, this is the last block of representative placeholder content. Again,
                            not really intended to be actually read, simply here to give you a better view of what this
                            would look like with some actual content. Your content.</p>
                    </div>
                    <div class="col-md-5">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                             width="500" height="410"
                             src="/storage/photos/1/home-img3.jpg">

                    </div>
                </div>

                <hr class="featurette-divider">

                <!-- /END THE FEATURETTES -->
            </div>
        </div>
        @include('frontend.partials.questions')
    </div>
@endsection


