@extends('layouts.app')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/product.css">
    <link rel="stylesheet" type="text/css" href="/storage/css/frontend/product_responsive.css">
@endsection

@section('custom_js')
    <script src="/storage/js/frontend/product.js"></script>
@endsection

@section('content')
    <div class="mains" style="min-height: 1000px; height: auto !important;background-image:url('/images/bg_suppliers.jpg');
    background-attachment: fixed;background-repeat: no-repeat">
        <div class="container py-5">
            <h1 class="pb-2 border-bottom" style="text-align: center;margin-bottom: 20px; color: wheat">{{_t('Supplier for today')}}:
{{--                <span style="color: brown">{{ \App\Models\Supplier:: where('active', 1)->first()->name}}</span>--}}
                <span style="color: brown">{{ (\App\Models\Supplier:: where('active', 1)->first()->name) ?? 'No active supplier'}}</span>
            </h1>
            <div class="supplier_list mb-5" style="background-color: white">
                <div class="row g-2 p-5 d-flex">
                @foreach($suppliers as $supplier)

                    <!-- Product Details -->

                        <div class="product_details hover {{ ($supplier->active == 1) ? 'active' : '' }}" style="min-height: 600px">
                            <div class="container containers">
                                <div class="row details_row">

                                    <!-- Supplier Image -->
                                    <div class="col-lg-6">
                                        <div class="details_image">
                                            <div class="details_image_large">
                                                <img src="{{$supplier->image??'/images/no_image.jpg'}}" alt="{{$supplier->name}}" width="75%"
                                                     height="75%">
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Product Content -->
                                    <div class="col-lg-6">
                                        <div class="details_content">
                                            <div class="details_name d-block" data-id="{{$supplier->id}}">
                                                <span>{{$supplier->name}}</span>
                                            </div>
                                            <div class="details_price d-block">
                                                <span>{{ $supplier->address }}</span>
                                            </div>
                                            <div class="details_price d-block">{{_t('Phone')}}:
                                                <span>{{ $supplier->phone }}</span>
                                            </div>
                                            <div class="details_price d-block">{{_t('Opentime')}}:
                                                <span>{{ $supplier->opentime }}</span>
                                            </div>
                                            <div class="details_price d-block">{{_t('Email')}}:
                                                <span style="color: red">{{ $supplier->email }}</span>
                                            </div>



                                            <!-- choosed -->
                                            <div class="in_stock_container">
                                                <div class="availability">{{_t('Status')}}: </div>
                                                @if($supplier->active == 1)
                                                    <span style="color: green">{{_t('Enable')}}</span>
                                                @else
                                                    <span style="color: #cc0000">{{_t('Disable')}}</span>
                                                @endif
                                            </div>

                                            <div class="description_title">{{_t('Description')}}:</div>
                                            {{--                            <p>{{$supplier->description}}</p>--}}
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam ea
                                                natus quidem sed
                                                sequi sunt voluptatibus. A aliquid atque autem consectetur culpa ducimus
                                                eius facilis fugit
                                                illo in incidunt ipsa ipsam laudantium, libero magnam minus nam natus
                                                nesciunt odio officiis.
                                            </p>
                                        </div>
                                        <div class="innerhtml"></div>
                                        <!-- Product Quantity -->
                                        <div class="card-footer">
                                            <a href="{{ route('frontend.more_supplier', $supplier->slug) }}"
                                               class="btn btn__primary">{{_t('More')}}</a>
                                            <a href="{{ route('frontend.getMenu', $supplier->slug) }}"
                                               class="btn btn__primary">{{_t('To menu')}}</a>
                                            <a href="{{ route('frontend.change_supplier', $supplier->slug) }}"
                                               class="btn btn-info">{{_t('Activate supplier')}}</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                <div class="col-12 hover2 p-3">--}}
                        {{--                    <div class="card-body p-3 m-1 border rounded border-primary">--}}
                        {{--                        <div class="row d-flex">--}}
                        {{--                            <div class="col-6 row d-flex">--}}
                        {{--                                <div class="col-8" style="width: 70px;height: 70px;">--}}
                        {{--                                    <img src="{{$supplier->image}}" class="img-thumbnail" alt="" width="50px"--}}
                        {{--                                         height="50px">--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                        </div>--}}
                        {{--                        <div class="card-title">--}}

                        {{--                        </div>--}}
                        {{--                        <div class="card">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-6 text-center"><strong>Address: </strong></div>--}}
                        {{--                                <div class="col-6">{{ $supplier->address }}</div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-6 text-center"><strong>Phone: </strong></div>--}}
                        {{--                                <div class="col-6">{{ $supplier->phone ??'' }}</div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-6 text-center"><strong>Opentime: </strong></div>--}}
                        {{--                                <div class="col-6">{{ $supplier->opentime ??'' }}</div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-6 text-center"><strong>Email: </strong></div>--}}
                        {{--                                <div class="col-6">{{ $supplier->email }}</div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}
                        <hr>
                    @endforeach

                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $suppliers->onEachSide(2)->links() !!}
            </div>
{{--            <div class="">{{ $suppliers->onEachSide(2)->links() }}</div>--}}

        </div>
    </div>

@endsection
