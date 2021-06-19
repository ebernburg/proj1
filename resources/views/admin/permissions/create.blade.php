@extends('layouts.admin_layout')

@section('title', 'Permissions')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('create') }} {{ _t('permission.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.permissions.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
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
