@extends('layouts.admin_layout')

@section('title', 'Supplier - create')

@section('content')
    @can('supplier_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.suppliers.create") }}">
                {{ _t('create') }} {{ _t('supplier.title_singular') }}
            </a>
        </div>
    </div>
    @endcan
<div class="card">
    <div class="card-header">
        {{ _t('supplier.title_singular') }} {{ _t('list') }}
    </div>
    @if (session('succes'))
        <div class="alert alert-success">
            {{ session('succes') }}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ _t('supplier.fields.name') }}
                        </th>
                        <th>
                            {{ _t('supplier.fields.verified_at') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $key => $supplier)
                        <tr data-entry-id="{{ $supplier->id }}">

                            <td>
                                {{ $supplier->id ?? '' }}
                            </td>
                            <td>
                                {{ $supplier->name ?? '' }}
                            </td>
                            <td>
                                {{ $supplier->created_at ?? '' }}
                            </td>
                            <td>
                                @can('supplier_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.suppliers.show', $supplier->id) }}">
                                        {{ _t('view') }}
                                    </a>
                                @endcan
                                @can('supplier_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.suppliers.edit', $supplier->id) }}">
                                        {{ _t('edit') }}
                                    </a>
                                    @endcan
                                    @can('supplier_delete')
                                    <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('{{ _t('areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ _t('delete') }}">
                                    </form>
                                    @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $('.datatable').DataTable()
    </script>
@endpush
{{--@push('scripts')--}}
{{--<script>--}}
{{--    $(function () {--}}
{{--  let deleteButtonTrans = '{{ _t('datatables.delete') }}'--}}
{{--  let deleteButton = {--}}
{{--    text: deleteButtonTrans,--}}
{{--    url: "{{ route('admin_mix.suppliers.massDestroy') }}",--}}
{{--    className: 'btn-danger',--}}
{{--    action: function (e, dt, node, config) {--}}
{{--      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
{{--          return $(entry).data('entry-id')--}}
{{--      });--}}

{{--      if (ids.length === 0) {--}}
{{--        alert('{{ _t('datatables.zero_selected') }}')--}}

{{--        return--}}
{{--      }--}}

{{--      if (confirm('{{ _t('areYouSure') }}')) {--}}
{{--        $.ajax({--}}
{{--          headers: {'x-csrf-token': _token},--}}
{{--          method: 'POST',--}}
{{--          url: config.url,--}}
{{--          data: { ids: ids, _method: 'DELETE' }})--}}
{{--          .done(function () { location.reload() })--}}
{{--      }--}}
{{--    }--}}
{{--  }--}}
{{--  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
{{--@can('supplier_delete')--}}
{{--  dtButtons.push(deleteButton)--}}
{{--@endcan--}}

{{--  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })--}}
{{--})--}}

{{--</script>--}}
{{--@endpush--}}
