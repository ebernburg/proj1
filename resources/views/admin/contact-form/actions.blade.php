<a class="btn btn-xs btn-info" href="{{ route('admin_mix.contact-form.edit', $model->id) }}">
    {{ ('Edit') }}
</a>

<form action="{{ route('admin.contact-form.destroy', $model->id) }}" method="POST" onsubmit="return confirm('{{ ('global.areYouSure') }}');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-xs btn-danger" value="{{ ('global.delete') }}">
</form>
