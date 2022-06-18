@extends('layouts.app')

@section('content')
<a href="/narocila" class="btn btn-default">Nazaj</a>
<h1>{{$narocilo->jedilnik()->select ('Ime')->first()["Ime"]}}</h1>
<br><br>

<table class="table" style="width: 30%">
    <tbody>
    <tr>
        <th scope="row" class="col-xs-5">Namen</th>
        <td>{{$narocilo->Namen}}</td>
    </tr>
    <tr>
        <th scope="row">Natakar</th>
        <td>{{$narocilo->user()->select ('name')->first()["name"]}}</td>
    </tr>
    <tr>
        <th scope="row">Stranka</th>
        <td>{{$narocilo->stranka()->select ('Ime')->first()["Ime"]}}</td>
    </tr>
    <tr>
        <th scope="row">Skupina</th>
        <td>{{$narocilo->Skupina}}</td>
    </tr>
    <tr>
        <th scope="row">Datum</th>
        <td>{{$narocilo->Datum}}</td>
    </tr>
    <tr>
        <th scope="row">Količina</th>
        <td>{{$narocilo->Kolicina}}</td>
    </tr>
    <tr>
        <th scope="row">Številka mize</th>
        <td>{{$narocilo->Id_Miza}}</td>
    </tr>
    </tbody>
</table>

<hr>
<small>Vpisal {{$narocilo->user()->first()->name}} {{$narocilo->Datum}}</small>
<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $narocilo->Id_Natakar)
<a href="/narocila/{{$narocilo->Id_Narocilo}}/edit" class="btn btn-default">Uredi</a>

{!!Form::open(['action' => ['NarocilaController@destroy', $narocilo->Id_Narocilo], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Izbriši', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif
@endif
@endsection