<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$name}}">{{ _t("{$name}") }}*</label>
    <input type="text" id="{{$name}}" name="{{$name}}" class="form-control" value="{{ old($name, $value ?? $model->$name) }}">
    @if($errors->has($name))
        <p class="help-block">
            {{ $errors->first($name) }}
        </p>
    @endif
</div>








{{--{{ old($name, $value ?? $model->$name) }}--}}
{{--<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">--}}
{{--    <label for="{{str_replace(['[',']'],['_',''],$name)}}">{{ $label??__(Str::title(str_replace('_',' ',$name))) }}{{isset($required)&&$required?'*':''}}</label>--}}
{{--    <input type="text" id="{{str_replace(['[',']'],['_',''],$name)}}" name="{{$name}}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}" value="{{ old($name, $value ?? $model->$name) }}">--}}
{{--    @if($errors->has($name))--}}
{{--        <p class="help-block help-block-error">--}}
{{--            {{ $errors->first($name) }}--}}
{{--        </p>--}}
{{--    @endif--}}
{{--</div>--}}
