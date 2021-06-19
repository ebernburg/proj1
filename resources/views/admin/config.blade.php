@extends('layouts.admin_layout')

@section('content')
    <h2>Routes</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>HTTP Method</th>
            <th>Route</th>
            <th>Name</th>
            <th>Corresponding Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($routeCollection as $value)
            <tr>
                <td>{{$value->methods()[0]}}</td>
                <td>{{$value->uri()}}</td>
                <td>{{$value->getName()}}</td>
                <td>{{$value->getActionName()}}</td>
            </tr>
        @endforeach
    </table>
@endsection
