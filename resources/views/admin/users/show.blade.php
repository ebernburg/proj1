@extends('layouts.admin_layout')

@section('title', 'User')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('show') }} {{ _t('user.title') }}
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        {{ _t('user.fields.name') }}
                    </th>
                    <td>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('user.fields.email') }}
                    </th>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('user.fields.email_verified_at') }}
                    </th>
                    <td>
                        {{ $user->email_verified_at }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Roles
                    </th>
                    <td>
                        @foreach($user->roles as $id => $roles)
                            <span class="badge badge-info">{{ $roles->name }}</span>
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
        <a class="nav-link" href="{{route('admin.users.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
