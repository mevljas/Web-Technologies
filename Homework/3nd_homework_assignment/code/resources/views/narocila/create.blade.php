@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="display-3">Novo naročilo</h1>
        <div>
            {!! Form::open(['action' => 'NarocilaController@store', 'method' => 'POST', 'enctype' =>
            'multipart/form-data',]) !!}
            <div class="form-group {{ $errors->has('Kolicina') ? ' has-error' : '' }}">
                {{Form::label('Id_Jedilnik', 'Naročilo', [ 'class' => 'control-label'])}}
                {{Form::select('Id_Jedilnik', \App\Jedilnik::all()->sortBy('Ime')->pluck('Ime', 'Id_Jedilnik' ), null,
                ['class' => 'form-control', 'style'=>'width:80%'])}}
                @if ($errors->has('Id_Jedilnik'))
                <span class="help-block">
                        <strong>{{ $errors->first('Id_Jedilnik') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Id_Stranka') ? ' has-error' : '' }}">
                {{Form::label('Id_Stranka', 'Stranka', [ 'class' => 'control-label'])}}
                {{Form::select('Id_Stranka', \App\Stranka::all()->sortBy('Ime')->pluck('Ime', 'Id_Stranka' ), null,
                ['class' => 'form-control', 'style'=>'width:30%'])}}
                @if ($errors->has('Id_Stranka'))
                <span class="help-block">
                        <strong>{{ $errors->first('Id_Stranka') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Skupina') ? ' has-error' : '' }}">
                {{Form::label('Skupina', 'Skupina', [ 'class' => 'control-label'])}}
                {{Form::text('Skupina', '', ['class' => 'form-control', 'placeholder' =>
                "Skupina",'style'=>'width:30%'])}}
                @if ($errors->has('Skupina'))
                <span class="help-block">
                        <strong>{{ $errors->first('Skupina') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Namen') ? ' has-error' : '' }}">
                {{Form::label('Namen', 'Namen', [ 'class' => 'control-label'])}}
                {{Form::text('Namen', '', ['class' => 'form-control', 'placeholder' => "Namen",'style'=>'width:30%'])}}
                @if ($errors->has('Namen'))
                <span class="help-block">
                        <strong>{{ $errors->first('Namen') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Datum') ? ' has-error' : '' }}">
                {{Form::label('Datum', 'Datum', [ 'class' => 'control-label'])}}
                {{Form::date('Datum', '', ['class' => 'form-control', 'placeholder' => "Namen",'style'=>'width:30%'])}}
                @if ($errors->has('Datum'))
                <span class="help-block">
                        <strong>{{ $errors->first('Datum') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Id_Miza') ? ' has-error' : '' }}">
                {{Form::label('Id_Miza', 'Številka mize', [ 'class' => 'control-label'])}}
                {{Form::number('Id_Miza', '', ['class' => 'form-control' ,'style'=>'width:12%', 'min'=>1, 'max'=>100])}}
                @if ($errors->has('Id_Miza'))
                <span class="help-block">
                        <strong>{{ $errors->first('Id_Miza') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Kolicina') ? ' has-error' : '' }}">
                {{Form::label('Kolicina', 'Količina', [ 'class' => 'control-label'])}}
                {{Form::number('Kolicina', 1, ['class' => 'form-control' ,'style'=>'width:12%', 'min'=>1, 'max'=>30,
                'required'])}}
                @if ($errors->has('Kolicina'))
                <span class="help-block">
                        <strong>{{ $errors->first('Kolicina') }}</strong>
                    </span>
                @endif
            </div>


            {{Form::submit('Oddaj', ['class'=>'btn btn-primary', 'style'=>'width:20%'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection