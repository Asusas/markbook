@extends('layouts.app')

@section('content')

    <div class="container">
        <div class=" col-md-6 mx-auto"> 
            <form action="{{route('grades.update', $grade->id)}}" method="post">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label>Redaguoti pazymi:</label>
                        <input type="number" class="form-control" name="grade" value="{{$grade->grade}}">
                        <br>
                        <input class="btn btn-success btn-sm btn-block" type="submit" value="Redaguoti">
                    </div>
            </form>
            <form action="{{route('grades.destroy', $grade->id)}}" method="post">
                @csrf
                @method('delete')
                <div class="form-group">
                    <input class="btn btn-danger btn-sm btn-block" type="submit" value="Istrinti">
                </div>
            </form>
        </div>
    </div>
    
@endsection