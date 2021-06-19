@extends('layouts.admin_layout')

@section('title', 'Add')

@section('content')
    @can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.product.create") }}">
                {{ _t('create') }} {{ _t('product.title_singular') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ _t('product.title_singular') }} {{ _t('global.list') }}
        </div>
        @if (session('succes'))
            <div class="alert alert-success">
                {{ session('succes') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ _t('title') }}
                        </th>
                        <th>
                            {{ _t('created') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $key => $product_item)
                        <tr data-entry-id="{{ $product_item->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $product_item->title ?? '' }}
                            </td>
                            <td>
                                {{ $product_item->created_at ?? '' }}
                            </td>
                            <td>
                                @can('product_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.product.show', $product_item->id) }}">
                                    {{ _t('view') }}
                                </a>
                                @endcan
                                @can('product_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.product.edit', $product_item->id) }}">
                                    {{ _t('edit') }}
                                </a>
                                    @endcan
                                @can('product_delete')
                                <form action="{{ route('admin.product.destroy', $product_item->id) }}" method="POST" onsubmit="return confirm('{{ _t('areYouSure') }}');" style="display: inline-block;">
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
