@extends('layouts.admin_layout')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('edit') }} {{ _t('product_category.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.product_categories.update", [$model->id]) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main">{{ _t('main') }}</a>
                    </li>
                    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key=>$language)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#{{ $key }}">{{ $language['native'] }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="main">
                        @include('admin/_partials/input', [ 'name' => 'sort'])
                        {{--                    @include('admin_mix/_partials/input', [ 'name' => 'slug'])--}}
                        @include('admin/_partials/select', [ 'name' => 'status','array' => \App\Models\ProductCategory::STATUSES])
                        {{--                    @include('admin_mix/_partials/select2', [ 'name' => 'parent_id','array' => \App\Models\ProductCategory::getForSelect()])--}}
                    </div>
                    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key=>$language)
                        <div class="tab-pane fade" id="{{ $key }}">
                            @include('admin/_partials/trans_input', ['key' => $key, 'name' => 'title'])
                            @include('admin/_partials/trans_input', ['key' => $key, 'name' => 'slug'])
                            @include('admin/_partials/trans_textarea', ['key' => $key, 'name' => 'description'])

                        </div>
                    @endforeach
                </div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ _t('save') }}">
                    </div>
            </form>
        </div>
    </div>

@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product_categories.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
@push('scripts')
    <script>
        $(function () {
            let deleteButtonTrans = '{{ _t('datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.product_categories.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ _t('datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ _t('areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('product_category_delete')
            dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({buttons: dtButtons})
        })

    </script>
@endpush
