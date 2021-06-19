@extends('layouts.admin_layout')

@section('content')

    @can('translation_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.translations.create") }}">
                    {{ _t('Add new') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ _t('Translations') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th>

                        </th>
                        <th>
                            {{ _t('Key') }}
                        </th>
                        <th>
                            {{ _t('EN') }}
                        </th>
                        <th>
                            {{ _t('DE') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($translations as $key => $translation)
                        <tr data-entry-id="{{ $key }}">
                            <td>
                            </td>
                            <td>
                                {{ $key }}
                            </td>
                            @foreach($translation as $language)
                                <td>
                                    {{ $language->value ?: '' }}
                                </td>
                            @endforeach
                            @can('translation_edit')
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.translations.edit', base64_encode($key)) }}">
                                    {{ _t('Edit') }}
                                </a>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
{{--@section('scripts')--}}
{{--    @parent--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            let deleteButtonTrans = '{{ _t('Delete') }}'--}}
{{--            let deleteButton = {--}}
{{--                text: deleteButtonTrans,--}}
{{--                url: "{{ route('admin_mix.translations.massDestroy') }}",--}}
{{--                className: 'btn-danger',--}}
{{--                action: function (e, dt, node, config) {--}}
{{--                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
{{--                        return $(entry).data('entry-id')--}}
{{--                    });--}}

{{--                    if (ids.length === 0) {--}}
{{--                        alert('{{ _t('global.datatables.zero_selected') }}')--}}

{{--                        return--}}
{{--                    }--}}

{{--                    if (confirm('{{ _t('global.areYouSure') }}')) {--}}
{{--                        $.ajax({--}}
{{--                            headers: {'x-csrf-token': _token},--}}
{{--                            method: 'POST',--}}
{{--                            url: config.url,--}}
{{--                            data: { ids: ids, _method: 'DELETE' }})--}}
{{--                            .done(function () { location.reload() })--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
{{--            @can('translation_delete')--}}
{{--            dtButtons.push(deleteButton)--}}
{{--            @endcan--}}

{{--            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })--}}
{{--        })--}}

{{--    </script>--}}
{{--@endsection--}}
