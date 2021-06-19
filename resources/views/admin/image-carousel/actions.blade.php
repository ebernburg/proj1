<a class="btn btn-xs btn-info" href="{{ route('admin.image-carousel.edit', $model->id) }}">
    {{ _t('Edit') }}
</a>

<form action="{{ route('admin.image-carousel.destroy', $model->id) }}" method="POST" onsubmit="return confirm('{{ _t('global.areYouSure') }}');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-xs btn-danger" value="{{ _t('global.delete') }}">
</form>
