<label for="food">{{ trans('product.js') }}*
</label>
<select name="food[]" id="food" class="form-control select2" multiple="multiple">
    @foreach($users as $id => $item)
        <option value="{{ $id }}" {{ ($id == old($item->id) ? 'selected' : '') }}>
            {{ $item->name}}
        </option>
    @endforeach
</select>
<div class="col-lg-12">

</div>

<div id="allblock">
</div>
