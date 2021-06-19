<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$name}}">{{ _t("{$name}") }}*</label>
    <textarea type="text" id="{{$name}}" name="{{$name}}" class="form-control">
        {{ old("{$name}", isset(${$model}) ? ${$model}->$name : '') }}
    </textarea>
    @if($errors->has($name))
        <p class="help-block">
            {{ $errors->first($name) }}
        </p>
    @endif
    {{--    <p class="helper-block">--}}
    {{--        {{ __("{$name}_helper") }}--}}
    {{--    </p>--}}
</div>
