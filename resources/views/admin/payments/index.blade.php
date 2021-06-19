@extends('layouts.admin_layout')

@section('title', 'Payment - create')

@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.payments.create") }}">
                {{ _t('create') }} {{ _t('payment.title_singular') }}
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ _t('payment.title_singular') }} {{ _t('list') }}
    </div>
    @if (session('succes'))
        <div class="alert alert-success">
            {{ session('succes') }}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ _t('payment.fields.title') }}
                        </th>
                        <th>
                            {{ _t('payment.fields.description') }}
                        </th>
                        <th>
                            {{ _t('payment.fields.created_at') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $key => $payment)
                        <tr data-entry-id="{{ $payment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ isset($payment->translate()->title) ? $payment->translate()->title : '' }}
                            </td>
                            <td>
                                {{ isset($payment->translate()->description) ? $payment->translate()->description : '' }}
                            </td>
                            <td>
                                {{ $payment->created_at ?? '' }}
                            </td>
                            <td>

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.payments.edit', $payment->id) }}">
                                        {{ _t('edit') }}
                                    </a>

                                    <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('{{ _t('areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ _t('delete') }}">
                                    </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $('.datatable').DataTable()
    </script>
@endpush
