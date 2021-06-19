@extends('layouts.admin_layout')

@section('title', 'Show')

@section('content')
<div class="card">
    <div class="card-header">
        {{ _t('show') }} {{ _t('supplier') }}
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ _t('supplier') }}
                    </th>
                    <th>
                        {{ _t('supplier.fields.address') }}
                    </th>
                    <th>
                        {{ _t('supplier.fields.phone') }}
                    </th>
                    <th>
                        {{ _t('supplier.fields.email') }}
                    </th>
                    <th>
                        {{ _t('supplier.fields.active') }}
                    </th>
                </tr>
                <tr>
                    <td>
{{--                        {{ $supplier->translate('en')->title }}--}}
                        {{ $supplier->name }}
                    </td>
                    <td>
                        {{ $supplier->address }}
                    </td>
                    <td>
                        {{ $supplier->phone }}
                    </td>
                    <td>
                        {{ $supplier->email }}
                    </td>
                    <td>
                        {{ $supplier->active }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.suppliers.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
