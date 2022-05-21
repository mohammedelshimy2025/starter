@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped text-center">
            <thead>
            <h1 class="text-center">الاطباء</h1>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Title</th>
                {{--<th scope="col">الأجراءات</th>--}}
            </tr>
            </thead>
            <tbody>
            @if(isset($doctors) && $doctors -> count() > 0)
                @foreach ($doctors as $doctor)
                    <tr>
                        <th scope="row">{{$doctor ->id}}</th>
                        <td>{{$doctor ->name}}</td>
                        <td>{{$doctor ->title}}</td>
                        {{--<td><a href="" class="btn btn-success">Doctors</a></td>--}}

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection