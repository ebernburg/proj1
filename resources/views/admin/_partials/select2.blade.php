<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="{{$name}}">{{ _t("{$name}") }}*
        <span class="btn btn-info btn-xs select-all">Select all</span>
        <span class="btn btn-info btn-xs deselect-all">Deselect all</span>

    </label>
    <select id="{{$name}}" name="{{$name}}[]" class="form-control select2"  multiple="multiple">

        {{--        For parent_id=null--}}

        <option value="0">No parent_id</option>
        {{--        For parent_id=null--}}

        @foreach($array as $key => $item)
            <option value="{{ $key }}" {{  isset(${$model}) ? ($key == ${$model}->$name ? 'selected' : '') : ($key == old($name) ? 'selected' : '') }}>{{ _t("{$item}") }} </option>
        @endforeach
    </select>
    @if($errors->has($name))
        <p class="help-block">
            {{ $errors->first($name) }}
        </p>
    @endif

</div>

{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        $('.js-example-basic-multiple').select2();--}}
{{--    });--}}
{{--</script>--}}
