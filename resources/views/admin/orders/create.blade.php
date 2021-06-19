@extends('layouts.admin_layout')

@section('title', 'Order - create')
@php
    //dd(\App\Models\Product::getForSelect());
@endphp
@section('content')
    <div class="containers">
    <div class="card">
        <div class="card-header">
            {{ _t('Create') }} {{ _t('Order') }}
        </div>
        <div class="card-body">
            <form action="{{ route("admin.orders.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main">{{ _t('main') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                                @include('admin/_partials/select', [ 'name' => 'user_id', 'label' => _t('user'), 'array' => \App\Models\User::getForSelect()])
                                @include('admin/_partials/select', [ 'name' => 'payment_id','label' => _t('payment'), 'array' => \App\Models\Payment::getForSelect()])
                                @include('admin/_partials/textarea', [ 'name' => 'user_comment'])
                                @include('admin/_partials/textarea', [ 'name' => 'manager_comment'])

                        <div class="multiple-input">
                            <div class="multiple-input-content">
                                @foreach (!is_array($model->productOrder)?json_decode($model->productOrder, true):$model->productOrder as $product)
                                    <div class="row multiple-input-row related_dropdown" data-index="{{$loop->index}}" id="dropdown_{{$loop->index}}">
                                        {{--                                                                                <div class="col-3">--}}
                                        {{--                                                                                    <div class="form-group clearfix">--}}
                                        {{--                                                                                        <label for="{{str_replace(['[',']'],['_',''],"colors[$loop->index][images][0][image]")}}">{{ ('Image') }}</label>--}}
                                        {{--                                                                                        <div>--}}
                                        {{--                                                                                            <div id="holder_{{str_replace(['[',']'],['_',''],"colors[$loop->index][images][0][image]")}}">--}}
                                        {{--                                                                                                <img  src="{{ $product.js['product.js']['main_image'] }}" style="margin-top:15px;max-height:100px;max-width: 100%">--}}
                                        {{--                                                                                            </div>--}}
                                        {{--                                                                                        </div>--}}
                                        {{--                                                                                    </div>--}}
                                        {{--                                                                                    						@include('admin_mix/_partials/image', ['name' => "images[$loop->index][image]",'value'  =>'messages.['main_image'],'label'=>'Image'])--}}
                                        {{--                                                                                </div>--}}
                                        <div class="">
                                            @include('admin/_partials/select', ['name' => "product[$loop->index][product_id]",'value'=>$product->product_id??0,'label'=>_t('title'), 'array' => \App\Models\Product::getForSelect(),])
                                        </div>
                                        <div class="">
                                            @include('admin/_partials/input2', ['name' => "product[$loop->index][price]",'value'=>$product->price??1,'label'=>_t('Price')])
                                        </div>
                                        <div class="">
                                            @include('admin/_partials/number', ['name' => "product[$loop->index][quantity]",'value'=>$product['quantity']??1,'label'=>_t('Quantity')])
                                        </div>
                                        <div class="">
                                            <div class="form-group">
                                                <button class="btn-sm btn-danger multiple-input-remove" type="button" style="margin-top: 35px">
                                                    {{ _t('Remove product') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-1 offset-11">
                                    <button class="btn-sm multiple-input-add btn-success" type="button">
                                        {{ _t('Add product') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-danger" value="{{ _t('Save') }}">
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.orders.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
{{--@push('scripts')--}}
{{--<script>--}}
{{--    const multiple_inputs=$('.multiple-input');--}}
{{--    multiple_inputs.on('click','.multiple-input-add',function (e) {--}}
{{--    // $('.multiple-input-add').click(function () {--}}
{{--        const this_button = $(this);--}}
{{--            const widget = $(this).closest('.multiple-input');--}}
{{--            const rows = widget.find('.multiple-input-row');--}}

{{--            const count = rows.length;--}}
{{--            const last_number = count - 1;--}}
{{--            const last_row = rows[last_number];--}}
{{--            let tmpl = last_row.outerHTML;--}}
{{--            const regex1 = new RegExp('\_' + last_number + '\_', 'g');--}}
{{--            const regex2 = new RegExp('\\[' + last_number + '\\]', 'g');--}}
{{--            const regex3 = new RegExp('value="(.)*"', 'g');--}}
{{--            const regex4 = new RegExp('src="(.)*"', 'g');--}}

{{--            if (this_button.hasClass('select_class')) {--}}
{{--                tmpl = tmpl.replace(regex1, '_' + count + '_')--}}
{{--                    .replace(regex2, '[' + count + ']')--}}
{{--                    .replace(regex4, 'src=""');--}}
{{--            } else {--}}
{{--                tmpl = tmpl.replace(regex1, '_' + count + '_')--}}
{{--                    .replace(regex2, '[' + count + ']')--}}
{{--                    .replace(regex3, 'value=""')--}}
{{--                    .replace(regex4, 'src=""');--}}
{{--            }--}}

{{--            widget.find('.multiple-input-content').append(tmpl);--}}
{{--            if (widget.find('.multiple-input-row').length > 1) {--}}
{{--                widget.find('.multiple-input-remove').each(function () {--}}
{{--                    $(this).show();--}}
{{--                });--}}
{{--            }--}}
{{--    })--}}


{{--@endpush--}}
