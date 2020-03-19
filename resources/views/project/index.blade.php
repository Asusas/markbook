@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            

            <h1><strong>Elektronine pazymiu knygele</strong></h1>
            @auth
                <div class="col-md-6 mx-auto ">
                    <a class="btn btn-light   float-right" href="{{route('students.create')}}"><b>Prideti studenta</b></a>
                    <a class="btn btn-light  float-right" href="{{route('lectures.create')}}"><b>Prideti pamoka</b> </a>
                    <a class="btn btn-light   float-right" href="{{route('grades.create')}}"><b>Rasyti pazymius</b></a>
                </div>
            @endauth
        </div>
        <div class="row">
            <div class="col-md-8">
                <hr>
                <table class="table  table-hover">
                    <thead>
                        <h4 class="text-center">Studentai</h4>
                        <tr>
                            <th>Vardas</th>
                            <th>Pavarde</th>
                            @auth <th>Informacija</th>@endauth
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->surname}}</td>
                                <td class="text-center">
                                    @auth 
                                        <a class="btn btn-secondary btn-sm float-left" href="{{route('students.show', $item->id )}}">Perziureti</a>
                                     @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <hr>
                <table class="table table-bordered table-striped">
                    <thead>
                        <h4 class="text-center">Pamokos</h4>
                        <tr>
                            <th>Pamokos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lecture as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection