 @extends('layouts.admin_layout')

@section('content')

<div class="card">
    <div class="card-header">
        {{ _t('Create') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.translations.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tab-pane active" id="main">
                @include('admin/_partials/input', ['model' => 'translation', 'name' => 'key'])
            </div>
            @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key=>$language)
                <div class="tab-pane fade" id="{{ $key }}">
                    @include('admin/_partials/trans_textarea_without_editor', ['model' => 'translation','key' => $key, 'name' => 'value'])
                </div>
            @endforeach
            <div>
                <input class="btn btn-danger" type="submit" value="{{ _t('Save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.translations.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
