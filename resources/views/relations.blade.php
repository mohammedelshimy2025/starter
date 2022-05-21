@extends('layouts.app')

@section('content')
    <table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Code</th>
    </tr>
    </thead>
    <tbody>
    {{--@foreach ($users as $user)--}}
    <tr>
        <th scope="row">1</th>
        <td>{{$users ->name}}</td>
        <td>{{$users ->email}}</td>
        <td>{{$phone ->phone}}</td>
        <td>{{$phone ->code}}</td>
         {{--@endforeach--}}
    </tr>

    </tbody>
</table>

@endsection