@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" col-md-10 mx-auto"> 
            <div class="card" style="width: 100%;">
                <img src="" class="card-img-top" alt="">
                <div class="card-body">
                  <h5 class="card-title">Studento informacija</h5>
                <p class="card-text">{{$student->name}} {{$student->surname}}</p>
                </div>
                <table class="table table-bordered text-center">
                    
                    <tr>
                        <td>Pamoka / vidurkis</td>
                        @foreach ($lecture as $item)
                            <td><b>{{$item->name}}</b></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td></td>
                        @foreach ($student->grade as $item)
                            <td>{{$item->grade}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Vidurkis</td>
                        <td>(Cia bus vidurkis)</td>
                    </tr>

                </table>
                <div class="card-body">
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </div>
              </div>
        </div>
    </div>
@endsection