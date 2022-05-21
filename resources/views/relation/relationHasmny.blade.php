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

        @if($hospitals > 0 )
            {{--@foreach ($hospitals as $hospital)--}}
                <tr>
                    <th scope="row">1</th>
                    <td>{{$hospital ->name}}</td>
                    <td>{{$hospital ->title}}</td>
                    {{--<td>{{$phone ->phone}}</td>--}}
                    {{--<td>{{$phone ->code}}</td>--}}

                </tr>
            {{--@endforeach--}}
        @endif

        </tbody>
    </table>

@endsection