@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Dobrodošli na spletni strani restavracije!</h1>
    <p>Aplikacija vam omogoča upravljanje delovanja restavracije.</p>
    @if(Auth::guest())
    <p>
        <a class="btn btn-primary btn-lg" href="/login" role="button">Prijava</a>
        <a class="btn btn-success btn-lg" href="/register" role="button">Registracija</a>
    </p>
    @endif

</div>
@endsection
