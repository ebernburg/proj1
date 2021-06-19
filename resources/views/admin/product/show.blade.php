@extends('layouts.admin_layout')

@section('title', 'Show')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ _t('show') }} {{ _t('product.title') }}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        {{ _t('product.fields.title') }}
                    </th>
                    <td>
                        {{--                        {{ $product.js->translate('en')->title }}--}}
                        {{ $product->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product.fields.price') }}
                    </th>
                    <td>
                        {{ $product->price }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product.fields.content') }}
                    </th>
                    <td>
                        {{ $product->content }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product.fields.status') }}
                    </th>
                    <td>
                        {{ $product->status }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product.fields.product_category_id') }}
                    </th>
                    <td>
                        {{ $product->product_category_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product.fields.sort') }}
                    </th>
                    <td>
                        {{ $product->sort }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('product.fields.slug') }}
                    </th>
                    <td>
                        {{ $product->slug }}
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
