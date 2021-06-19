@extends('layouts.admin_layout')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ $title??_t('create') }} {{_t("Contact form")}}
        </div>
        <div class="card-body">
            <form id="form" action="{{ $route??route('admin.contact-form.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($method??'POST')
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main">{{ _t('main') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                        @include('admin/_partials/input', [ 'name' => 'name'])
                        @include('admin/_partials/input', ['name' => 'email'])
                        @include('admin/_partials/tinymce', ['name' => 'message'])
                        @include('admin/_partials/select', ['name' => 'status','value' => $model->status,'array' => \App\Models\ContactForm::STATUSES])


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
        <a class="nav-link" href="{{route('admin.contact-form.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
{{--@section('header_buttons_right')--}}
{{--    <li class="nav-item">--}}
{{--        <input class="btn btn-danger" form="form" type="submit" value="{{ $button?? _t('Save') }}">--}}
{{--    </li>--}}
{{--@endsection--}}
