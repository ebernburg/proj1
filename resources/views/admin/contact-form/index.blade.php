@extends('layouts.admin_layout')

@section('content')
    @can('contact-form_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contact-form.create') }}">
                {{ _t('create') }} {{ _t('contact-form') }}
            </a>
        </div>
    </div>
    @endcan
<div class="card">
    <div class="card-header">
        Contact forms
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable"
{{--                   data-url="{{route('admin.contact-form.index-ajax')}}"--}}
{{--                   data-columns='@json($columns)'--}}
{{--                   data-order='@json($orders)'--}}
            >
                <thead>
                    <tr>
                        <th>
                            {{ _t('ID') }}
                        </th>
                        <th>
                            {{ _t('Name') }}
                        </th>
                        <th>
                            {{ _t('Email') }}
                        </th>
                        <th>
                            {{ _t('message') }}
                        </th>
                        <th>
                            {{ _t('Status') }}
                        </th>
                        <th>
                            {{ _t('Created') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($contforms as $key => $contform)
                    <tr data-entry-id="{{ $contform->id }}">
                        <td>
                            {{ $contform->id }}
                        </td>
                        <td>
                            {{ $contform->name ?? '' }}
                        </td>
                        <td>
                            {{ $contform->email ?? '' }}
                        </td>
                        <td>
                            {{ $contform->message ?? '' }}
                        </td>
                        <td>
                            {{ $contform->status ?? '' }}
                        </td>
                        <td>
                            {{ $contform->created_at ?? '' }}
                        </td>
                        <td>
{{--                            @can('contact-form_show')--}}
{{--                            <a class="btn btn-xs btn-primary" href="{{ route('admin_mix.contact-form.show', $contform->id) }}">--}}
{{--                                 {{ _t('view') }}--}}
{{--                            </a>--}}
{{--                            @endcan--}}
                                @can('contact-form_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.contact-form.edit', $contform->id) }}">
                                {{ _t('edit') }}
                            </a>
                                @endcan
                                    @can('contact-form_delete')
                            <form action="{{ route('admin.contact-form.destroy', $contform->id) }}" method="POST" onsubmit="return confirm('{{ _t('areYouSure') }}');" style="display: inline-block;">
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
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.contact-form.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
@push('scripts')

    <script>
        $(function () {
            let deleteButtonTrans = '{{ _t('datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.contact-form.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ __('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ _t('areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('contact-form_delete')
            dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })

    </script>
@endpush

