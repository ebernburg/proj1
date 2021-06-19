@extends('layouts.admin_layout')

@section('title', 'Main page')

@section('content')

<div class="card">
    <div class="card-header">
        {{ _t('create') }} {{ _t('product_category.title_singular') }}
    </div>
    <div class="card-body">
        <form action="{{ route("admin.product_categories.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                    @include('admin/_partials/input', [ 'name' => 'sort'])
{{--                    @include('admin_mix/_partials/input', [ 'name' => 'slug'])--}}
                    @include('admin/_partials/select', [ 'name' => 'status','array' => \App\Models\ProductCategory::STATUSES])
{{--                    @include('admin_mix/_partials/select2', [ 'name' => 'parent_id','array' => \App\Models\ProductCategory::getForSelect()])--}}
                </div>
                @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key=>$language)
                    <div class="tab-pane fade" id="{{ $key }}">
                        @include('admin/_partials/trans_input', ['key' => $key, 'name' => 'title'])
                        @include('admin/_partials/trans_input', ['key' => $key, 'name' => 'slug'])
                        @include('admin/_partials/trans_textarea', ['key' => $key, 'name' => 'description'])

                    </div>
                @endforeach
            </div>

                <div class="card-footer">
                    <input class="btn btn-danger" type="submit" value="{{ _t('save') }}">
                </div>
        </form>
    </div>
</div>
@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product_categories.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
