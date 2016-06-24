@extends('layouts.app')

@section('content')
<section id="registration">
    <div class="container margintop40">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" id="registrationheader">
                        Registrierung
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Username</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="name" value="{{ old('name') }}" onkeyup="checkUsername();" onfocus="checkUsername();">
                                    @if ($errors->has('name'))
                                        <span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span>
                                    @endif
                                    <label id="usernameHint" style="display:none">Der Username muss zwischen 3 - 12 Zeichen entsprechen</label>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Adresse</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" onkeyup="validateEmail();" onfocus="validateEmail();">

                                    @if ($errors->has('email'))
                                        <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
                                    @endif
                                    <label id="emailHint" style="display:none">Geben Sie bitte eine valide E-Mailadresse ein</label>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Passwort</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Passwort bestätigen</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button id="register" type="submit" class="btn btn-black" disabled>
                                        <i class="fa fa-btn fa-user"></i> Registrieren
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
