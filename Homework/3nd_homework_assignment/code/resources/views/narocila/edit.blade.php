@extends('layouts.app')

@section('content')
<div class="col-md-9 col-md-offset-3">
    <h1>Uredi naročilo</h1>
    {!! Form::open(['action' => ['NarocilaController@update', $narocilo->Id_Narocilo], 'method' => 'POST', 'enctype' =>
    'multipart/form-data']) !!}
    <div class="form-group {{ $errors->has('Id_Jedilnik') ? ' has-error' : '' }}">
        {{Form::label('Id_Jedilnik', 'Naročilo', [ 'class' => 'control-label'])}}
        {{Form::select('Id_Jedilnik', \App\Jedilnik::all()->pluck('Ime', 'Id_Jedilnik' ), $narocilo->Id_Jedilnik,
        ['class' => 'form-control', 'style'=>'width:50%'] )}}
        @if ($errors->has('Id_Jedilnik'))
        <span class="help-block">
                <strong>{{ $errors->first('Id_Jedilnik') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('Id_Stranka') ? ' has-error' : '' }}">
        {{Form::label('Id_Stranka', 'Stranka', [ 'class' => 'control-label'])}}
        {{Form::select('Id_Stranka', \App\Stranka::all()->pluck('Ime', 'Id_Stranka' ), $narocilo->Id_Stranka, ['class'
        => 'form-control', 'style'=>'width:20%']) }}
        @if ($errors->has('gdpr'))
        <span class="help-block">
                <strong>{{ $errors->first('gdpr') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('Skupina') ? ' has-error' : '' }}">
        {{Form::label('Skupina', 'Skupina', [ 'class' => 'control-label'])}}
        {{Form::text('Skupina', $narocilo->Skupina, ['class' => 'form-control', 'placeholder' =>
        "Skupina",'style'=>'width:20%'])}}
        @if ($errors->has('Skupina'))
        <span class="help-block">
                <strong>{{ $errors->first('Skupina') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('Namen') ? ' has-error' : '' }}">
        {{Form::label('Namen', 'Namen', [ 'class' => 'control-label'])}}
        {{Form::text('Namen', $narocilo->Namen, ['class' => 'form-control', 'placeholder' =>
        "Namen",'style'=>'width:20%'])}}
        @if ($errors->has('Namen'))
        <span class="help-block">
                <strong>{{ $errors->first('Namen') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('Datum') ? ' has-error' : '' }}">
        {{Form::label('Datum', 'Datum', [ 'class' => 'control-label'])}}
        {{Form::date('Datum', $narocilo->Datum, ['class' => 'form-control', 'placeholder' =>
        "Namen",'style'=>'width:20%'])}}
        @if ($errors->has('Datum'))
        <span class="help-block">
                <strong>{{ $errors->first('Datum') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('Id_Miza') ? ' has-error' : '' }}">
        {{Form::label('Id_Miza', 'Številka mize', [ 'class' => 'control-label'])}}
        {{Form::number('Id_Miza', $narocilo->Id_Miza, ['class' => 'form-control' ,'style'=>'width:10%', 'min'=>1,
        'max'=>100])}}
        @if ($errors->has('Id_Miza'))
        <span class="help-block">
                <strong>{{ $errors->first('Id_Miza') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('Kolicina') ? ' has-error' : '' }}">
        {{Form::label('Kolicina', 'Količina', [ 'class' => 'control-label'])}}
        {{Form::number('Kolicina', $narocilo->Kolicina, ['class' => 'form-control' ,'style'=>'width:10%', 'min'=>1,
        'max'=>30, 'required'])}}
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
