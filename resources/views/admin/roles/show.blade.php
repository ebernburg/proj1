@extends('layouts.admin_layout')

@section('title', 'Roles')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('show') }} {{ _t('role.title') }}
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        {{ _t('role.fields.title') }}
                    </th>
                    <th>
                        {{ _t('permissions') }}
                    </th>

                </tr>
                <tr>
                    <td>
                        {{ $model->name }}
                    </td>
                    <td>
                        @foreach($model->permissions as $id => $permission)

                            <span class="btn btn-info btn-xs select-all">{{ $permission->name }}</span>

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
        <a class="nav-link" href="{{route('admin.roles.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
