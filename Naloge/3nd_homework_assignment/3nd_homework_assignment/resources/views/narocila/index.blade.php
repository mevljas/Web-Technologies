@extends('layouts.app')

@section('content')
<a href="/narocila/create" class="btn btn-primary">Novo naročilo</a>
<br>
<br>
{!! Form::open(['action' => ['NarocilaController@index'], 'method' => 'POST', 'enctype' =>
'multipart/form-data']) !!}
{{Form::hidden('_method','PUT')}}
<div class="form-group">
    {{Form::label('Filter', 'Iskanje')}}
    <div class="form-inline">
        {{Form::text('Filter', null, ['class' => 'form-control', 'placeholder' =>
        "Filter",'style'=>'width:30%'])}}
        {{Form::submit('Išči', ['class'=>'btn btn-primary'])}}
    </div>


</div>


{!! Form::close() !!}

<h1>Naročila</h1>
@if(count($narocila) > 0)
@foreach($narocila as $narocilo)
<div class="well col-md-8">
    <div class="row">
        <div class="col-md-12">
            <h3><a href="/narocila/{{$narocilo->Id_Narocilo}}">{{$narocilo->jedilnik()->select
                    ('Ime')->first()["Ime"]}}</a></h3>
            <small>Vpisal {{$narocilo->user()->first()->name}} {{$narocilo->Datum}}</small>
        </div>
    </div>
</div>
@endforeach
@else
<p>Ni naročil</p>
@endif
@endsection