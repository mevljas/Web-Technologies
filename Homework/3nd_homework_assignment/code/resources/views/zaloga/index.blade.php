@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h1 class="display-3">Zaloga</h1>
        <hr>
        <a href="/zaloga/create" class="btn btn-primary">Nov vnos</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Ime</td>
                <td>Količina</td>
            </tr>
            </thead>
            <tbody>
            @foreach($zaloga as $vnos)
            <tr>
                <td>{{$vnos->Ime}}</td>
                <td>{{$vnos->Kolicina}}</td>
                @if(!Auth::guest())
                <td><a href="/zaloga/{{$vnos->Id_Zaloga}}/edit" class="btn btn-default">Uredi</a></td>

                <td>{!!Form::open(['action' => ['ZalogaController@destroy', $vnos->Id_Zaloga], 'method' => 'POST',
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