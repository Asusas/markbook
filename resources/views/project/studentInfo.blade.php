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
                        <td>Pažymiai</td>
{{--                        sita foreacha sukame, kad mums sukurtu tiek laukeliu, kiek yra paskaitu, nei daugiau, nei maziau--}}
                        @foreach ($lecture as $key)
{{--                            tada kuriame stulpeli, kuriame tikrinsime salyga, ar studento ir sutampa su pazymio (student_id), jeigu sutampa, tai--}}
{{--                            ideda pazymi, i spana, ir i td vidu, jeigu salyga netenkina, palieka tuscia td--}}
                            <td>
                                @foreach($key->grade as $item)
                                    @if($student->id == $item->student_id)
                                        <span>{{$item->grade}}</span>
                                    @endif
                                @endforeach
                            </td>
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