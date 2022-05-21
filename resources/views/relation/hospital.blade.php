@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <h1 class="text-center">المستشفيات</h1>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">الأجراءات</th>
            </tr>
            </thead>
            <tbody>
            @if(Session::has('success'))

                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>

            @endif

            @if(isset($hospitals) && $hospitals -> count() > 0)
                @foreach ($hospitals as $hospital)
                <tr>
                    <th scope="row">{{$hospital ->id}}</th>
                    <td>{{$hospital ->name}}</td>
                    <td>{{$hospital ->address}}</td>
                    <td>
                        <a href="{{route('hospital.doctor' ,  $hospital -> id) }}" class="btn btn-success">عرض الاطباء</a>
                        <a href="{{route('delete.hospital' ,  $hospital -> id) }}" class="btn btn-danger">حذف</a>
                    </td>

                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

@endsection