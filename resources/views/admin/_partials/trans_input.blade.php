<div class="form-group {{ $errors->has($key.'.'.$name) ? 'has-error' : '' }}">
    <label for="{{$key}}[{{$name}}]">{{$label??_t($name)}}</label>
    <input type="text" id="{{$key}}[{{$name}}]" name="{{$key}}[{{$name}}]" class="form-control {{ $errors->has($key.'.'.$name) ? 'is-invalid' : '' }}" value="{{ old("{$key}.{$name}", isset($model->translate($key)->$name) ? $model->translate($key)->$name : (isset($default_url)?$default_url:'')) }}">
    @if($errors->has("{$key}.{$name}"))
        <p class="help-block">
            {{ $errors->first("{$key}.{$name}") }}
        </p>
    @endif
</div>
