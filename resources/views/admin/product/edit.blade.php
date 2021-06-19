@extends('layouts.admin_layout')

@section('title', 'Form')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('create') }} {{ _t('product.title_singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route("admin.product.update", $model->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main">{{ _t('main') }}</a>
                    </li>
                    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key=>$language)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#{{ $key }}">{{ $language['native'] }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                        @include('admin/_partials/image', ['name' => 'image'])
                        @include('admin/_partials/input', [ 'name' => 'price'])
                        @include('admin/_partials/select', [ 'name' => 'product_category_id','array' => \App\Models\ProductCategory::getForSelect()])
                        @include('admin/_partials/select', [ 'name' => 'supplier_id','array' => \App\Models\Supplier::getForSelect()])
                        @include('admin/_partials/input', [ 'name' => 'slug'])
                        @include('admin/_partials/input', [ 'name' => 'sort'])
                        @include('admin/_partials/select', [ 'name' => 'status', 'value' => $model->status, 'array' => \App\Models\Product::STATUSES])
                    </div>
                    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key=>$language)
                        <div class="tab-pane fade" id="{{ $key }}">
                            @include('admin/_partials/trans_input', ['key' => $key, 'name' => 'title'])
                            @include('admin/_partials/trans_input', ['key' => $key, 'name' => 'slug'])
                            @include('admin/_partials/trans_textarea', ['key' => $key, 'name' => 'description'])

                        </div>
                    @endforeach
                </div>

                {{--                <div class="card-body">--}}
                {{--                    @include('admin_mix/_partials/image', ['name' => 'image'])--}}
                {{--                    @include('admin_mix/_partials/input', [ 'name' => 'title'])--}}
                {{--                    @include('admin_mix/_partials/input', [ 'name' => 'price'])--}}
                {{--                    @include('admin_mix/_partials/select', [ 'name' => 'food_category_id','array' => \App\Models\ProductCategory::getForSelect()])--}}
                {{--                    @include('admin_mix/_partials/select', [ 'name' => 'supplier_id','array' => \App\Models\Supplier::getForSelect()])--}}
                {{--                    @include('admin_mix/_partials/input', [ 'name' => 'slug'])--}}
                {{--                    @include('admin_mix/_partials/input', [ 'name' => 'sort'])--}}
                {{--                    @include('admin_mix/_partials/tinymce', [ 'name' => 'content'])--}}
                {{--                    @include('admin_mix/_partials/select', [ 'name' => 'status', 'value' => $model->status, 'array' => \App\Models\Food::STATUSES])--}}

                {{--                </div>--}}

                <div class="card-footer">
                    <input class="btn btn-danger" type="submit" value="{{ _t('save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection

