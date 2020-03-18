@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" col-md-10 mx-auto"> 
            <div class="card" style="width: 100%;">
                <img src="" class="card-img-top" alt="">
                <div class="card-body">
                  <h5 class="card-title">Studento informacija</h5>
                <p class="card-text"><b>{{$student->name}} {{$student->surname}}</b></p>
                </div>
                <table class="table table-bordered text-center">
                    
                    <tr>
                        <td>Pamoka / vidurkis</td>

                        @foreach ($lecture as $item)
                            <td><b>{{$item->name}}</b></td>
                        @endforeach

                    </tr>

                    <tr>
                        <td>Pažymiai</td>
                    {{-- sita foreacha sukame, kad mums sukurtu tiek laukeliu, kiek yra paskaitu, nei daugiau, nei maziau--}}

                        @foreach ($lecture as $key)

                    {{-- tada kuriame stulpeli, kuriame tikrinsime salyga, ar studento id sutampa su pazymio (student_id), jeigu sutampa, tai--}}
                    {{--  ideda pazymi, i spana, ir i td vidu, jeigu salyga netenkina, palieka tuscia td--}}
                            <td>
                                @foreach($key->grade as $item)
                                    @if($student->id == $item->student_id)
                                        <a href="{{route('grades.edit', $item->id)}}"><span class="btn-info btn-sm">{{$item->grade}}</span></a> 
                                    @endif
                                @endforeach
                            </td>

                        @endforeach
                    </tr>

                    <tr>
                        <td>Vidurkis <strong style="font-size:20px">&#8680;</strong></td>
                        <td>Vidurkis ??</td>
                    </tr>
                    @if(Auth::user()->admin == 1)
                        <tr>
                            <td>
                                <form action="{{route('students.destroy', $student->id )}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-sm btn-danger btn-block" value="Istrinti mokini">
                                </form>
                                <hr>
                                <a href="{{route('students.edit', $student->id )}}" class="btn btn-primary btn-sm btn-block">Redaguoti mokini</a>
                            </td>
                        </tr>
                    @endif


                </table>
                
                    
                
              </div>
        </div>
    </div>
@endsection