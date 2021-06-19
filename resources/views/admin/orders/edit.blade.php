@extends('layouts.admin_layout')

@section('title', 'Order - edit')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('edit') }} {{ _t('order.title_singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route("admin.orders.update", [$model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main">{{ _t('main') }}</a>
                    </li>
                </ul>
                <div class="card-body">

                    @include('admin/_partials/select', ['model' => 'order', 'name' => 'user_id','array' => \App\Models\User::getForSelect()])
                    @include('admin/_partials/select', ['model' => 'order', 'name' => 'payment_id','array' => \App\Models\Payment::getForSelect()])

                    @include('admin/_partials/textarea', [ 'name' => 'user_comment'])
                    @include('admin/_partials/textarea', [ 'name' => 'manager_comment'])

                    <div class="tab-pane" id="food">
                        <div class="multiple-input">
                            <div class="multiple-input-content">
                                @foreach (!is_array($model->product)?json_decode($model->product, true):$model->product as $product)
                                    <div class="row multiple-input-row related_dropdown" data-index="{{$loop->index}}" id="dropdown_{{$loop->index}}">
                                        {{--                                        <div class="col-3">--}}
                                        {{--                                            <div class="form-group clearfix">--}}
                                        {{--                                                <label for="{{str_replace(['[',']'],['_',''],"colors[$loop->index][images][0][image]")}}">{{ ('Image') }}</label>--}}
                                        {{--                                                <div>--}}
                                        {{--                                                    <div id="holder_{{str_replace(['[',']'],['_',''],"colors[$loop->index][images][0][image]")}}">--}}
                                        {{--                                                        <img  src="{{ $product.js['product.js']['main_image'] }}" style="margin-top:15px;max-height:100px;max-width: 100%">--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            --}}{{--						@include('admin_mix/_partials/image', ['name' => "images[$loop->index][image]",'value'  =>'messages.['main_image'],'label'=>'Image'])--}}
                                        {{--                                        </div>--}}
                                        <div class="col-3">
                                            @include('admin/_partials/select', ['name' => "product[$loop->index][product_id]",'value'=>$product->id??0,'label'=>('title'), 'array' => \App\Models\Product::getForSelect(), 'change' => "getColors(this);"])
                                        </div>
                                        <div class="col-1">
                                            @include('admin._partials.input2', ['name' => "product[$loop->index][price]",'value'=>$product->price??1,'label'=>('Price')])
                                        </div>
                                        <div class="col-1">
                                            @include('admin/_partials/number', ['name' => "product[$loop->index][quantity]",'value'=>$product->quantity??1,'label'=>('Quantity')])
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group">
                                                <button class="btn-sm btn-danger multiple-input-remove" type="button" style="margin-top: 35px">
                                                    {{ _t('remove_product') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-1 offset-11">
                                    <button class="btn-sm multiple-input-add btn-success" type="button">
                                        {{ _t('add_product') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.orders.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
