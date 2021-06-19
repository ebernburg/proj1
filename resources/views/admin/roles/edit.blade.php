@extends('layouts.admin_layout')

@section('title', 'Roles')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ _t('edit') }} {{ _t('role.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.roles.update", [$model->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    @include('admin/_partials/input', [ 'name' => 'name'])
                </div>
                <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                    <label for="permissions">{{ _t('role.fields.permissions') }}*
                        <span class="btn btn-info btn-xs select-all">Select all</span>
                        <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                    <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple">
                        @foreach($permissions as $id => $permission)
                            <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($model) && $model->permissions->contains($id)) ? 'selected' : '' }}>
                                {{ $permission }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('permissions'))
                        <p class="help-block">
                            {{ $errors->first('permissions') }}
                        </p>
                    @endif
                    <p class="helper-block">
                        {{ _t('role.fields.permissions_helper') }}
                    </p>
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
        <a class="nav-link" href="{{route('admin.roles.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
