@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9 col-md-offset-3">
        <a href="/zaloga" class="btn btn-default">Nazaj</a>
        <h1 class="display-3">Nov vnos</h1>
        <div>
            {!! Form::open(['action' => 'ZalogaController@store', 'method' => 'POST', 'enctype' =>
            'multipart/form-data',]) !!}
            <div class="form-group {{ $errors->has('Ime') ? ' has-error' : '' }}">
                {{Form::label('Ime', 'Ime', [ 'class' => 'control-label'])}}
                {{Form::text('Ime', null, ['class' => 'form-control', 'placeholder' => "Ime",'style'=>'width:30%',
                'required'])}}
                @if ($errors->has('Ime'))
                <span class="help-block">
                    <strong>{{ $errors->first('Ime') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Kolicina') ? ' has-error' : '' }}">
                {{Form::label('Kolicina', 'Količina', [ 'class' => 'control-label'])}}
                {{Form::number('Kolicina', null, ['class' => 'form-control', 'placeholder' => "Cena"
                ,'style'=>'width:10%', 'min'=>0, 'max'=>50 , 'required'])}}
                @if ($errors->has('Kolicina'))
                <span class="help-block">
                    <strong>{{ $errors->first('Kolicina') }}</strong>
                </span>
                @endif
            </div>


            {{Form::submit('Potrdi', ['class'=>'btn btn-primary', 'style'=>'width:10%'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection