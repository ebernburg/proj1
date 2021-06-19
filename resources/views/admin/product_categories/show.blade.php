@extends('layouts.admin_layout')

@section('title', 'Show')

@section('content')
<div class="card">
    <div class="card-header">
        {{ _t('show') }} {{ _t('product_category.title_singular') }}
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ _t('product_category.fields.title') }}
                    </th>
                    <td>
{{--                        {{ $product_category->translate('en')->title }}--}}
                        {{ $product_category->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product_category.fields.sort') }}
                    </th>
                    <td>
                        {{ $product_category->sort }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product_category.fields.content') }}
                    </th>
                    <td>
                        {{ $product_category->content }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product_category.fields.status') }}
                    </th>
                    <td>
                        {{ $product_category->status }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product_category.fields.parent_id') }}
                    </th>
                    <td>

                        @foreach($parent_id as $item)
                            {{ $item->title }}
                        @endforeach
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
</div>

@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product_categories.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
