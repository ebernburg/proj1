<div class="form-group {{ $errors->has($key.'.'.$name) ? 'has-error' : '' }}">
    <label for="{{$key}}[{{$name}}]">{{ $label??_t("{$name}") }}</label>
    <textarea id="{{$key}}[{{$name}}]" name="{{$key}}[{{$name}}]" class="form-control">{{ old("{$key}.{$name}", isset($model->translate($key)->$name) ? $model->translate($key)->$name : '') }}</textarea>
    @if($errors->has("{$key}_{$name}"))
        <p class="help-block">
            {{ $errors->first("{$key}_{$name}") }}
        </p>
    @endif
</div>
