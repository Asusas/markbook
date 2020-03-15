@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1><strong>Elektronine pazymiu knygele</strong></h1>
            @auth
                <div class="col-md-6 mx-auto">
                    <a class="btn btn-warning btn-sm btn-block" href="{{route('students.create')}}">Prideti studenta</a>
                    <a class="btn btn-success btn-sm btn-block" href="{{route('lectures.create')}}">Prideti pamoka</a>
                    <a class="btn btn-danger btn-sm btn-block" href="{{route('grades.create')}}">Rasyti pazymius</a>
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
                            @auth <th>Veiksmai</th>@endauth
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->surname}}</td>
                                <td class="text-center">
                                    @auth 
                                        <a class="btn btn-secondary btn-sm " href="{{route('students.show', $item->id )}}">Perziureti</a>
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