@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-9">
        <h1 class="display-3">Jedilnik</h1>
        <hr>
        <a href="/jedilnik/create" class="btn btn-primary">Nov vnos</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Ime</td>
                <td>Cena</td>
                <td>Vrsta</td>
            </tr>
            </thead>
            <tbody>
            @foreach($jedilnik as $vnos)
            <tr>
                <td>{{$vnos->Ime}}</td>
                <td>{{$vnos->Cena}} €</td>
                <td>{{$vnos->Vrsta}}</td>
                @if(!Auth::guest())
                <td><a href="/jedilnik/{{$vnos->Id_Jedilnik}}/edit" class="btn btn-default">Uredi</a></td>

                <td>{!!Form::open(['action' => ['JedilnikController@destroy', $vnos->Id_Jedilnik], 'method' => 'POST',
                    'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Izbriši', ['class' => 'btn btn-danger'])}}
                </td>
                {!!Form::close()!!}
                </td>
                @endif
            </tr>
            @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endsection