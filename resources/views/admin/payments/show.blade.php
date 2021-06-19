@extends('layouts.admin_layout')

@section('title', 'Payment - show')

@section('content')
<div class="card">
    <div class="card-header">
        {{ _t('show') }} {{ _t('payment.title') }}
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ _t('payment.fields.name') }}
                    </th>
                    <th>
                        {{ _t('payment.fields.created_at') }}
                    </th>
                </tr>
                <tr>
                    <td>
                        {{--                        {{ $food_category->translate('en')->title }}--}}
                        {{ $payment->title }}
                    </td>
                    <td>
                        {{--                        {{ $food_category->translate('en')->title }}--}}
                        {{ $payment->created_at }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('header_buttons')
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.payments.index')}}"><i class="fas fa-caret-square-left"></i></a>
    </li>
@endsection
