<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{str_replace(['[',']'],['_',''],$name)}}">{{ $label??_t(Str::title(str_replace('_',' ',$name))) }}{{isset($required)&&$required?'*':''}}</label>
    <div id="holder_{{str_replace(['[',']'],['_',''],$name)}}">
        <img  src="{{ old($name, $value ?? $model->{$name}) }}" style="margin-top:15px;max-height:100px;max-width: 100%">
    </div>
    <input id="thumbnail_{{str_replace(['[',']'],['_',''],$name)}}" class="form-control " type="text" name="{{ $name }}" data-img="holder_{{str_replace(['[',']'],['_',''],$name)}}" value="{{ old($name, $value ?? $model->{$name}) }}">
    <a data-input="thumbnail_{{str_replace(['[',']'],['_',''],$name)}}" data-preview="holder_{{str_replace(['[',']'],['_',''],$name)}}" class="btn btn-primary lfm_image">{{ _t('Admin.Image.Choose') }}</a>
    @if($errors->has($name))
        <p class="help-block">
            {{ $errors->first($name) }}
        </p>
    @endif
</div>
