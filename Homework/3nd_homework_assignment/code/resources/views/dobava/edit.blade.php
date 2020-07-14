@extends('layouts.app')

@section('content')
<div class="col-md-9 col-md-offset-4">
    <a href="/dobava" class="btn btn-default">Nazaj</a>
    <h1>Uredi Vnos</h1>
    {!! Form::open(['action' => ['DobavaController@update', $dobava->Id_Dobava], 'method' => 'POST', 'enctype' =>
    'multipart/form-data']) !!}
    <div class="form-group {{ $errors->has('Id_Zaloga') ? ' has-error' : '' }}">
        {{Form::label('Id_Zaloga', 'Ime', [ 'class' => 'control-label'])}}
        {{Form::select('Id_Zaloga', \App\Zaloga::all()->sortBy('Ime')->pluck('Ime', 'Id_Zaloga' ),
        $dobava->zaloga()->pluck('Id_Zaloga' )->first(), ['class' => 'form-control', 'style'=>'width:40%'])}}
        @if ($errors->has('Id_Zaloga'))
        <span class="help-block">
                <strong>{{ $errors->first('Id_Zaloga') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('Id_Dobavitelj') ? ' has-error' : '' }}">
        {{Form::label('Id_Dobavitelj', 'Dobavitelj', [ 'class' => 'control-label'])}}
        {{Form::select('Id_Dobavitelj', \App\Dobavitelj::all()->sortBy('Ime')->pluck('Ime', 'Id_Dobavitelj' ),
        $dobava->Id_Dobavitelj, ['class' => 'form-control', 'style'=>'width:30%'])}}
        @if ($errors->has('Id_Dobavitelj'))
        <span class="help-block">
                <strong>{{ $errors->first('Id_Dobavitelj') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('DatumDobave') ? ' has-error' : '' }}">
        {{Form::label('DatumDobave', 'Datum dobave', [ 'class' => 'control-label'])}}
        {{Form::date('DatumDobave', $dobava->DatumDobave, ['class' => 'form-control', 'placeholder' =>
        "Namen",'style'=>'width:20%', 'required'])}}
        @if ($errors->has('DatumDobave'))
        <span class="help-block">
                <strong>{{ $errors->first('DatumDobave') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('Kolicina') ? ' has-error' : '' }}">
        {{Form::label('Kolicina', 'Kolicina', [ 'class' => 'control-label'])}}
        {{Form::number('Kolicina', $dobava->Kolicina, ['class' => 'form-control' ,'style'=>'width:8%', 'min'=>1,
        'max'=>100, 'required'])}}
        @if ($errors->has('Kolicina'))
        <span class="help-block">
                <strong>{{ $errors->first('Kolicina') }}</strong>
            </span>
        @endif
    </div>


    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Shrani', ['class'=>'btn btn-primary','style'=>'width:20%'])}}
    {!! Form::close() !!}
</div>

@endsection
