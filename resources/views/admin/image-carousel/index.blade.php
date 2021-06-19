@extends('layouts.admin_layout')

@section('content')
    @can('image-carousel_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.image-carousel.create") }}">
                {{ _t('add') }} {{ _t('image-carousel') }}
            </a>
        </div>
    </div>
    @endcan
<div class="card">
    <div class="card-header">
        {{ _t("image-carousel") }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable crud-datatable"
{{--                   data-url="{{route('admin.image-carousel.index-ajax')}}"--}}
{{--                   data-columns='@json($columns)'--}}
{{--                   data-order='@json($orders)'--}}
            >
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ _t("description") }}
                        </th>
                        <th>
                            &nbsp;{{_t('Title')}}
                        </th>
                        <th>
                            &nbsp;{{_t('status')}}
                        </th>
                        <th>
                            {{ _t('Created') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                @foreach($carousels as $key => $carousel)
                    <tr data-entry-id="{{ $carousel->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $carousel->description ?? '' }}
                        </td>
                        <td>
                            {{ $carousel->title ?? '' }}
                        </td>
                        <td>
                            {{ $carousel->status ?? '' }}
                        </td>
                        <td>
                            {{ $carousel->created_at ?? '' }}
                        </td>
                        <td>
                            @can('image-carousel_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.image-carousel.edit', $carousel->id) }}">
                                    {{ _t('edit') }}
                                </a>
                            @endcan
                            @can('image-carousel_delete')
                                <form action="{{ route('admin.image-carousel.destroy', $carousel->id) }}" method="POST" onsubmit="return confirm('{{ _t('areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ _t('delete') }}">
                                </form>
                            @endcan
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.image-carousel.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
@push('scripts')
    <script>
        $('.datatable').DataTable()
    </script>
@endpush
{{--@push('scripts')--}}
{{--    <script src=" {{mix('/js/datatable.js')}}"></script>--}}
{{--@endpush--}}

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            let deleteButtonTrans = '{{ _t('datatables.delete') }}'--}}
{{--            let deleteButton = {--}}
{{--                text: deleteButtonTrans,--}}
{{--                url: "{{ route('admin.image-carousel.massDestroy') }}",--}}
{{--                className: 'btn-danger',--}}
{{--                action: function (e, dt, node, config) {--}}
{{--                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
{{--                        return $(entry).data('entry-id')--}}
{{--                    });--}}

{{--                    if (ids.length === 0) {--}}
{{--                        alert('{{ _t('datatables.zero_selected') }}')--}}

{{--                        return--}}
{{--                    }--}}

{{--                    if (confirm('{{ _t('areYouSure') }}')) {--}}
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
{{--            @can('food_delete')--}}
{{--            dtButtons.push(deleteButton)--}}
{{--            @endcan--}}

{{--            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })--}}
{{--        })--}}

{{--    </script>--}}
{{--@endpush--}}
