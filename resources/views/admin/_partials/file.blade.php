<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$name}}">{{ _t("{$name}") }}*</label>
    {{--    <input type="file" id="thumbnail_{{$name}}" name="{{$name}}" class="form-control lfm-image" value="{{ old("$name", isset(${$model}) ? ${$model}->$name : '') }}">--}}
    <input id="thumbnail_{{$name}}" class="form-control " type="text" name="{{ $name }}" value="{{ old("$name", isset(${$model}) ? ${$model}->$name : '') }}">
    <a data-input="thumbnail_{{$name}}" class="btn btn-primary lfm_file">Choose</a>
    @if($errors->has($name))
        <p class="help-block">
            {{ $errors->first($name) }}
        </p>
    @endif
</div>
