@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Naročila</div>

                <div class="panel-body">
                    <a href="/narocila/create" class="btn btn-primary">Novo naročilo</a>
                    <h3>Vaša naročila</h3>
                    @if(count($narocila) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Št. mize</th>
                            <th>Skupina</th>
                            <th>Kolicina</th>
                            <th>Namen</th>
                            <th>Datum</th>
                            <th>Ime</th>
                            <th>Stranka</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($narocila as $narocilo)
                        <tr>
                            <td>{{$narocilo->Id_Miza}}</td>
                            <td>{{$narocilo->Skupina}}</td>
                            <td>{{$narocilo->Kolicina}}</td>
                            <td>{{$narocilo->Namen}}</td>
                            <td>{{$narocilo->Datum}}</td>
                            <td>{{$narocilo->jedilnik()->select ('Ime')->first()["Ime"]}}</td>
                            <td>{{$narocilo->stranka()->select ('Ime')->first()["Ime"]}}</td>
                            <td><a href="/narocila/{{$narocilo->Id_Narocilo}}/edit" class="btn btn-default">Uredi</a>
                            </td>
                            <td>
                                {!!Form::open(['action' => ['NarocilaController@destroy', $narocilo->Id_Narocilo],
                                'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Izbriši', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>Nimate naročil</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
