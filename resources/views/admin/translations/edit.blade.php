@extends('layouts.admin_layout')

@section('content')

<div class="card">
    <div class="card-header">
        {{ _t('global.edit') }} {{ _t('global.translation.title_singular') }}
    </div>

    <div class="card-body">
        @php($param = $translations['key'] )
        <form action="{{ route("admin.translations.update", base64_encode($param)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                <label for="key">{{ _t("key") }}*</label>
                <input type="text" id="key" name="key" class="form-control" value="{{ old('key',$param) }}">
                @if($errors->has('key'))
                    <p class="help-block">
                        {{ $errors->first('key') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ _t("key_helper") }}
                </p>
            </div>
            @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key=>$language)
                <div class="form-group {{ $errors->has($key.'[value]') ? 'has-error' : '' }}">
                    <label for="value">{{ $language['native'] }}*</label>
                    <textarea type="text" id="{{$key}}[value]" name="{{$key}}[value]" class="form-control">{{ old("{$key}[value]", isset($translations[$key])?$translations[$key]->value:'') }}</textarea>
                    @if($errors->has($key.'[value]'))
                        <p class="help-block">
                            {{ $errors->first($key.'[value]') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ _t("value_helper") }}
                    </p>
                </div>
            @endforeach
            <div>
                <input class="btn btn-danger" type="submit" value="{{ _t('Save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.translations.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
