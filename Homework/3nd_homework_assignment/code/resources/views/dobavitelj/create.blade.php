@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9 col-md-offset-4">
        <a href="/dobavitelj" class="btn btn-default">Nazaj</a>
        <h1 class="display-3">Nov vnos</h1>
        <div>
            {!! Form::open(['action' => 'DobaviteljController@store', 'method' => 'POST', 'enctype' =>
            'multipart/form-data',]) !!}
            <div class="form-group {{ $errors->has('Ime') ? ' has-error' : '' }}">
                {{Form::label('Ime', 'Ime', [ 'class' => 'control-label'])}}
                {{Form::text('Ime', null, ['class' => 'form-control', 'placeholder' => "Ime",'style'=>'width:20%',
                'required'])}}
                @if ($errors->has('Ime'))
                <span class="help-block">
                        <strong>{{ $errors->first('Ime') }}</strong>
                    </span>
                @endif
            </div>

            {{Form::submit('Potrdi', ['class'=>'btn btn-primary', 'style'=>'width:20%'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection