@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registracija</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ime</label>

                            <div class="col-md-6">
                                <input id="name" pattern="[a-žA-Ž]+" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Priimek</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" pattern="[a-žA-Ž]+" class="form-control" name="surname"
                                       value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail naslov</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Geslo</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" minlength="8"
                                       required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Potrditev gesla</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" minlength="8"
                                       name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gdpr') ? ' has-error' : '' }}">
                            <label for="gdpr" class="col-md-4 control-label">Dovoljujem zbiranje in obdelavo osebnih
                                podatkov</label>

                            <div class="col-md-1">
                                <input id="gdpr" type="checkbox" class="form-control" name="gdpr"
                                       value="{{ old('gdpr') }}" required>

                                @if ($errors->has('gdpr'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gdpr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registracija
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
