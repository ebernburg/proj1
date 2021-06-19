@extends('layouts.admin_layout')

@section('title', 'Permissions')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('Edit') }} {{ _t('Permissions') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.permissions.update", $model->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">

                    @include('admin/_partials/input', [ 'name' => 'name'])
                    @include('admin/_partials/input', [ 'name' => 'guard_name'])
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
        <a class="nav-link" href="{{route('admin.permissions.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
