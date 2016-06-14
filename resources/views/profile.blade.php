@extends('layouts.app')

@section('content')
<section class="container-fluid" id="profile">
    <div class="row">
        <div class="col-sm-12 col-md-12 margintop40">
            <button type="button" class="btn btn-black buttonLeft" onclick="goBack();">
                <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i>
                 Zurück
            </button>
         </div>
     </div>
    <h1 class="text-center">Profil 
        @if (!Auth::guest() && Auth::user()->name == $name)
            <a href="/editprofile"" class="editsize" style="font-size: 12px">
                <i class="fa fa-lock" aria-hidden="true"></i>
                edit
            </a> 
        @endif
    </h1>
    <article class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-3" align="center">
                            <img class="img-circle img-responsive" src="img/upload/avatar/{{$avatar}}">
                            <p style="margin-top: 10px">
                                <b>Rang:</b> 
                                @if($top == "0")
                                    {{ $rank }}
                                @endif
                                @if($top == "1")
                                    Anfänger
                                @endif
                                @if($top == "2")
                                    Helfer
                                @endif
                                @if($top == "3")
                                    Sympathisant
                                @endif
                                @if($top >= "4")
                                    Held
                                @endif
                            </p>
                            <p>
                                <b>Top-Antwort:</b> {{ $top }} mal
                            </p>
                        </div>
                        <div class="col-sm-8 col-sm-offset-1 col-md-8 col-md-offset-1">
                            @if (!Auth::guest() && Auth::user()->rights == 'Admin')
                                <div class="row borderBot borderTop borderPadding">
                                    <form action="/profile" method="POST">
                                        <div class="col-sm-3 col-md-3">
                                            <label style="color: #FF3430">Userrechte:</label>
                                        </div>
                                        <div class="col-sm-9 col-md-9">
                                            <select name="rights" id="rights">
                                                <option selected disabled>{{ $rights }}</option>
                                                <option value="User">User</option>
                                                <option value="Moderator">Moderator</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="userid" id="userid" value="{{ $user_id }}">
                                            <button type="submit" name="aendern" value="Ändern" class="btn btn-black">Ändern</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <label>Username:</label>
                                </div>
                                <div class="col-md-9">
                                    <label>{{ $name }}</label>
                                </div>
                            </div>
                            @if (!Auth::guest() && Auth::user()->rights == 'Admin')
                                <div class="row borderBot borderPadding">
                                    <div class="col-md-3">
                                        <label>Rang:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <label>{{ $rights }}</label>
                                    </div>
                                </div>
                            @endif
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <label>Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <label>{{ $forename }} {{ $surname }}</label>
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <label>E-Mail:</label>
                                </div>
                                <div class="col-md-9">
                                    <label>{{ $email }}</label>
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <label>Homepage:</label>
                                </div>
                                <div class="col-md-9">
                                    <label>{{ $page }}</label>
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <label>Hochschule:</label>
                                </div>
                                <div class="col-md-9">
                                    <label>{{ $college }}</label>
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <label>Studiengang:</label>
                                </div>
                                <div class="col-md-9">
                                    <label>{{ $course }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
@endsection