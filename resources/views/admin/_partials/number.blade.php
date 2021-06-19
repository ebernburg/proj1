<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{str_replace(['[',']'],['_',''],$name)}}">{{ $label??_t(Str::title(str_replace('_',' ',$name))) }}{{isset($required)&&$required?'*':''}}</label>
    <input type="number" min="1"  id="{{str_replace(['[',']'],['_',''],$name)}}" name="{{$name}}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" value="{{ old($name, $value ?? $model->$name) }}">
    @if($errors->has($name))
        <p class="help-block help-block-error">
            {{ $errors->first($name) }}
        </p>
    @endif
</div>
