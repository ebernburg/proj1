@extends('layouts.admin_layout')

@section('title', 'Payment - update')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('create') }} {{ _t('payment.title_singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route("admin.payments.update", $model->id) }}" method="POST" enctype="multipart/form-data">
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

                    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key=>$language)
                        <div class="tab-pane fade" id="{{ $key }}">

                            @include('admin/_partials/trans_input', ['key' => $key, 'name' => 'title'])
                            @include('admin/_partials/trans_input', ['key' => $key, 'name' => 'description'])

                            {{--                        @include('admin_mix/_partials/trans_input', ['key' => $key, 'name' => 'title', 'label'=>_t('admin_mix.title')])--}}
                            {{--                        @include('admin_mix/_partials/trans_textarea', ['key' => $key, 'name' => 'content', 'label'=>_t('admin_mix.content')])--}}
                            {{--                        @include('admin_mix/_partials/trans_input', ['key' => $key, 'name' => 'url', 'label'=>_t('admin_mix.url'), 'default_url'=>route('home').'/special/'])--}}
                            {{--                        @include('admin_mix/_partials/trans_input', ['key' => $key, 'name' => 'alt', 'label'=>_t('admin_mix.alt')])--}}
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
        <a class="nav-link" href="{{route('admin.payments.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection


