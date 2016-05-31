@extends('layouts.app')

@section('content')
<section class="container-fluid margintop40" id="profile">
    <h1 class="text-center studoverflow">Profil 
    @if (!Auth::guest() && Auth::user()->name == $name) <a href="/editprofile"" class="editsize">Edit</a> @endif</h1>
    @if (!Auth::guest() && Auth::user()->rights == 'Admin')
        <form class="text-center" action="/profile" method="POST">
            <label>Userrechte:</label>
            <select name="rights" id="rights">
                <option selected disabled>{{ $rights }}</option>
                <option value="User">User</option>
                <option value="Moderator">Moderator</option>
                <option value="Admin">Admin</option>
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="userid" id="userid" value="{{ $user_id }}">
            <input type="submit" name="aendern" value="Ändern" class="btnquestions">
        </form>
    @endif
    <article class="container margintop80">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-3 col-md-3 col-md-offset-1">
                <p><img class="profilpad avatar" src="img/upload/avatar/{{$avatar}}">
                </p>
                <p>
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
            <div class="col-md-4 col-sm-4">
                <p>
                    <b class="profil">{{ $rights }} </b>
                    </br>{{ $name }}
                </p>
                <p>
                    <b class="profil">Vorname</b>
                    </br> {{ $forename }}

                </p>
                <p>
                    <b class="profil">Nachname</b>
                    </br>{{ $surname }}
                </p>
                <p>
                    <b class="profil">E-Mail</b>
                    </br>{{ $email }}
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
                <p>
                    <b class="profil">Homepage</b>
                    </br>{{ $page }}
                </p>
                <p>
                    <b class="profil">Hochschule</b></br>{{ $college }}
                </p>
                <p>
                    <b class="profil">Studiengang</b></br>{{ $course }}
                </p>
            </div>
            <div class="col-md-12 col-sm-12">
                  <button onclick="goBack()" class="btnquestions messagebtn marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
            </div>
        </div>
    </article>
</section>
@endsection