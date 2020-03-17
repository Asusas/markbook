@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" col-md-6 mx-auto"> 
            <h1>Redaguoti studenta:</h1>
            <form action="{{route('students.update', $student->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                <input class="form-control" type="text" name="name" value="{{$student->name}}">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="surname" value="{{$student->surname}}">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="email" value="{{$student->email}}">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="phone" value="{{$student->phone}}">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-info" type="submit" value="Redaguoti">
                </div>
            </form>
        </div>
    </div>
@endsection