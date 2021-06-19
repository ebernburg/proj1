@extends('layouts.admin_layout')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ $title??_t('Create') }} {{ _t('image-carousel') }}
        </div>
        <div class="card-body">
            <form id="form" action="{{ $route??route("admin.image-carousel.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method??'POST')
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main">{{ _t('main') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                        {{--@include('admin_mix/_partials/input', [ 'name' => 'description'])--}}
                        <div class="multiple-input">

                            <div class="multiple-input-content">
                            @foreach ($model->items as $item)
                                <div class="row multiple-input-row">
                                <div class="col-3">
                                    @include('admin/_partials/image', ['model'=>$item, 'name' => "items[$loop->index][image]", 'value' => $item['image']?? '', 'label'=>_t('image')])
                                </div>
                                <div class="col-3">
                                    @include('admin/_partials/input', [ 'model'=>$item,'name' => "items[$loop->index][url]",
'value'=>$item['url']??'', 'label'=>_t('url')])
                                </div>
                                    <div class="col-3">
                                        @include('admin/_partials/input', [ 'model'=>$item,'name' => "items[$loop->index][alt_en]",
    'value'=>$item['alt_en']??'', 'label'=>_t('alt_en')])
                                        @include('admin/_partials/input', [ 'model'=>$item,'name' => "items[$loop->index][alt_de]",
    'value'=>$item['alt_de']??'', 'label'=>_t('alt_de')])


                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                        <button class="btn-sm btn-danger multiple-input-remove" type="button" style="{{$loop->count<2?'display:none':''}}">
                                            X
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                                <div class="row">
                                    <div class="col-3 offset-9">
                                        <button class="btn-sm multiple-input-add btn-success" type="button">
                                            +
                                        </button>
                                    </div>
                                </div>
                        </div>
                        @include('admin/_partials/input', [ 'name' => 'title', 'label'=>_t('title')])
                        @include('admin/_partials/select', ['name' => 'status','array' => \App\Models\ImageCarousel::STATUSES, 'label'=>_t('status')])

                        @include('admin/_partials/input', [ 'name' => 'key', 'label'=>_t('key')])
                        @include('admin/_partials/input', [ 'name' => 'description', 'label'=>_t('description')])

                    </div>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ $button?? _t('Save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.image-carousel.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection

