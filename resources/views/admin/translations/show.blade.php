@extends('layouts.admin_layout')

@section('content')

<div class="card">
    <div class="card-header">
        {{ _t('global.show') }} {{ _t('global.translation.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ _t('global.translation.fields.name') }}
                    </th>
                    <td>
                        {{ $translation->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('global.translation.fields.description') }}
                    </th>
                    <td>
                        {!! $translation->description !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ _t('global.translation.fields.price') }}
                    </th>
                    <td>
                        ${{ $translation->price }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.translations.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
