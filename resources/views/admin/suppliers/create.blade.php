@extends('layouts.admin_layout')

@section('title', 'Supplier - create')

@section('content')

<div class="card">
    <div class="card-header">
        {{ _t('create') }} {{ _t('supplier.title_singular') }}
    </div>
    <div class="card-body">
        <form action="{{ route("admin.suppliers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main">{{ _t('main') }}</a>
                    </li>
                </ul>
                <div class="card-body">
                    @include('admin/_partials/image', [ 'name' => 'image'])
                    @include('admin/_partials/input', [ 'name' => 'name'])
                    @include('admin/_partials/input', [ 'name' => 'address'])
                    @include('admin/_partials/input', [ 'name' => 'phone'])
                    @include('admin/_partials/input', [ 'name' => 'opentime'])
                    @include('admin/_partials/input', [ 'name' => 'email'])
                    @include('admin/_partials/input', [ 'name' => 'slug'])
                    @include('admin/_partials/select', [ 'value' => $model->active, 'name' => 'active','array' => \App\Models\Supplier::STATUSES])



                </div>

                <div class="card-footer">
                    <input class="btn btn-danger" type="submit" value="{{ _t('save') }}">
                </div>
        </form>
    </div>
</div>
@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.suppliers.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
