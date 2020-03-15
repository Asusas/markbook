@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" col-md-6 mx-auto"> 
            <h1>Prideti studenta:</h1>
            <form action="{{route('students.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Vardas">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="surname" placeholder="Pavarde">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="email" placeholder="El. pastas">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="phone" placeholder="Tel. numeris">
                </div>
                <div class="form-group">
                    <input class="form-control btn btn-info" type="submit" value="Irasyti">
                </div>
            </form>
        </div>
    </div>
@endsection