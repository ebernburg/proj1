<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$name}}">{{ $label??_t(Str::title(str_replace('_',' ',$name))) }}{{isset($required)&&$required?'*':''}}</label>
    <select id="{{$name}}" name="{{$name}}" class="form-control" {!! isset($change) ? "onchange='".$change."'" : '' !!}>
        @foreach($array as $key => $item)
            <option value="{{ ($key) }}" {{  isset($value) ? ($key == $value ? 'selected' : '') : ($key == old($name) ? 'selected' : '') }}>{{ $item }} </option>
        @endforeach
    </select>
    @if($errors->has($name))
        <p class="help-block">
            {{ $errors->first($name) }}
        </p>
    @endif
    {{--    <p class="helper-block">--}}
    {{--        {{ _t("{$name}_helper") }}--}}
    {{--    </p>--}}
</div>
