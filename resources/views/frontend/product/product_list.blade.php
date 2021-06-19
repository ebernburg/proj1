@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="container py-5">
            <h2 class="pb-2 border-bottom" style="text-align: center;">{{_t('Suppliers')}}</h2>
            <div class="supplier_list" style="background-color: white">
                <div class="row g-2 p-5">
                    @foreach($product_list as $product)

                        <div class="col-xl-3 col-lg-4 col-sm-6 card">
                            <div class="card-body p-3 m-2 border rounded border-primary">
                                <div>
                                    <img src="{{$product->image}}" alt="" width="50px" height="50px">
                                </div>
                                <div class="card-title">
                                    <h2>{{ $product->name }}</h2>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{_t('Price')}}: {{ $product->price }} Euro</li>
                                    <li class="list-group-item">{{_t('Supplier')}}: {{ $product->supplier->name}}</li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">{{_t('More')}}</a>
                                    <a href="#" class="card-link">{{_t('To menu')}}</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
