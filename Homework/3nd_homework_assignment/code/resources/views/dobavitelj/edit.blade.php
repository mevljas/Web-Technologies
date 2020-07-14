@extends('layouts.app')

@section('content')
<div class="col-md-9 col-md-offset-3">
    <a href="/dobavitelj" class="btn btn-default">Nazaj</a>
    <h1>Uredi Vnos</h1>
    {!! Form::open(['action' => ['DobaviteljController@update', $dobavitelj->Id_Dobavitelj], 'method' => 'POST',
    'enctype' => 'multipart/form-data']) !!}
    <div class="form-group {{ $errors->has('Ime') ? ' has-error' : '' }}">
        {{Form::label('Ime', 'Ime', [ 'class' => 'control-label'])}}
        {{Form::text('Ime', $dobavitelj->Ime, ['class' => 'form-control', 'placeholder' => "Ime",'style'=>'width:20%',
        'required'])}}
        @if ($errors->has('Ime'))
        <span class="help-block">
                        <strong>{{ $errors->first('Ime') }}</strong>
                    </span>
        @endif
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Shrani', ['class'=>'btn btn-primary','style'=>'width:20%'])}}
    {!! Form::close() !!}
</div>

@endsection
