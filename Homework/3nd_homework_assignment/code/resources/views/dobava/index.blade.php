@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-9">
        <h1 class="display-3">Dobava</h1>
        <hr>
        <a href="/dobava/create" class="btn btn-primary">Nov vnos</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Ime</td>
                <td>Količna</td>
                <td>Datum dobave</td>
                <td>Dobavitelj</td>
            </tr>
            </thead>
            <tbody>
            @foreach($dobava as $vnos)
            <tr>
                <td>{{$vnos->zaloga()->pluck('Ime')->implode('-')}}</td>
                <td>{{$vnos->Kolicina}}</td>
                <td>{{$vnos->DatumDobave}}</td>
                <td>{{$vnos->dobavitelj()->select ('Ime')->first()["Ime"]}}</td>
                @if(!Auth::guest())
                <td><a href="/dobava/{{$vnos->Id_Dobava}}/edit" class="btn btn-default">Uredi</a></td>

                <td>{!!Form::open(['action' => ['DobavaController@destroy', $vnos->Id_Dobava], 'method' => 'POST',
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