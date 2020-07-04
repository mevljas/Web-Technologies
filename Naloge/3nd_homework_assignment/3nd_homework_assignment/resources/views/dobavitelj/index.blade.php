@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <h1 class="display-3">Dobavitelji</h1>
        <hr>
        <a href="/dobavitelj/create" class="btn btn-primary">Nov vnos</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Ime</td>
            </tr>
            </thead>
            <tbody>
            @foreach($dobavitelj as $vnos)
            <tr>
                <td>{{$vnos->Ime}}</td>
                @if(!Auth::guest())
                <td><a href="/dobavitelj/{{$vnos->Id_Dobavitelj}}/edit" class="btn btn-default">Uredi</a></td>

                <td>{!!Form::open(['action' => ['DobaviteljController@destroy', $vnos->Id_Dobavitelj], 'method' =>
                    'POST', 'class' => 'pull-right'])!!}
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