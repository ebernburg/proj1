@extends('welcome')

@section('content')
    <div class="main">
        <div class="wrapper" style="background-color: wheat">
            <h1 style="text-align: center">Hello, are you hungry?</h1>
            <div class="container">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active mt-5 mb-5">
                            <img
                                src="https://pizza-stuebchen.de/wp-content/uploads/elementor/thumbs/Kind-Essen-Bestellen-oojg4bxv6726qymc6i43tbxe87iioccxgibo8ptw7s.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item mt-5 mb-5">
                            <img
                                src="https://wp-burgerme.s3.eu-west-1.amazonaws.com/burgerme2017/wp-content/uploads/2019/05/23170421/BM_CheeseBurger_768x500px_2.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item mt-5 mb-5">
                            <img
                                src="https://static.duesseldorf-tonight.de/thumbs/img/News/2/77/04/10/n/n_big/diese-restaurants-in-duesseldorf-bieten-euch-lieferdienst-take-away-1004772.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item mt-5 mb-5">
                            <img
                                src="https://www.koeln-news.com/wp-content/uploads/alan-hardman-780215-unsplash.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item mt-5 mb-5">
                            <img
                                src="https://ucarecdn.com/f5bff509-4c33-406f-ba0b-4eacb9a9270c/-/format/auto/-/preview/3000x3000/-/quality/lighter/"
                                class="d-block w-100" alt="...">
                        </div>
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
            <div class="marketing mt-5">
                <section id="info" class="info bg__color"
                         style="background-image: url('https://png.pngtree.com/thumb_back/fw800/back_our/20190619/ourmid/pngtree-product-overlooking-the-background-banner-image_138613.jpg');background-size: 100%">
                    <div class="container">
                        <div class="container">
                            <div class="title"><h2 class="title__name">HOW TO PLACE AN ORDER</h2></div>
                            <div class="info__list">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="info__item"><p class="info__item-description">Sign in</p></div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="info__item"><p class="info__item-description">Choose the dish and drink</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="info__item"><p class="info__item-description">Write your wish</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="info__item"><p class="info__item-description">Receive your order</p>
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
                        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span>
                        </h2>
                        <p class="lead">Some great placeholder content for the first featurette here. Imagine some
                            exciting prose here.</p>
                    </div>
                    <div class="col-md-5">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                             width="500" height="410"
                             src="https://www.rotergugelhan.de/itm-1562615679-SSID_2_80151_15402591.jpg">
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
                             src="https://allmaechd-nuernberg.de/wp-content/uploads/2021/01/poke-bowl.jpg">

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
                             src="https://storage.googleapis.com/stateless-meine-region-at/acaf80f0-essen-bestellen-wien-1220-mittagessen-liefern-lassen-meine-region.jpg">

                    </div>
                </div>

                <hr class="featurette-divider">

                <!-- /END THE FEATURETTES -->
            </div>
        </div>
    </div>
    </div>
@endsection
