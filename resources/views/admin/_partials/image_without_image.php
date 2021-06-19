<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$name}}">{{ _t("{$name}") }}*</label>

    {{--    <input type="file" id="thumbnail_{{$name}}" name="{{$name}}" class="form-control lfm-image" value="{{ old("$name", isset(${$model}) ? ${$model}->$name : '') }}">--}}
    <img id="holder_{{$name}}" src="{{ old("$name", isset(${$model}) ? ${$model}->$name : '') }}" style="margin-top:15px;max-height:100px;max-width: 100%">
    <input id="thumbnail_{{$name}}" class="form-control " type="text" name="{{ $name }}" value="{{ old("$name", isset(${$model}) ? ${$model}->$name : '') }}" readonly>
    <a data-inputid="thumbnail_{{$name}}" data-preview="holder_{{$name}}" class="btn btn-primary lfm_image popup_selector">Choose</a>
    @if($errors->has($name))
    <p class="help-block">
        {{ $errors->first($name) }}
    </p>
    @endif
</div>
