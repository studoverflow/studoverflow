@extends('layouts.app')

@section('content')
<section class="container-fluid margintop20" id="profile">
    <h1 class="text-center studoverflow">Profil 
    @if (!Auth::guest() && Auth::user()->name == $name) <a href="/editprofile"" class="editsize">Edit</a> @endif</h1> 
    <section class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <p><img class="profilpad avatar" src="img/upload/avatar/{{$avatar}}">
                </p>
                <p>
                    <b>Rang:</b> {{ $rank }}
                </p>
                <p>
                    <b>Top-Antwort:</b> {{ $top }} mal
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <b class="profil">User </b>
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
            <div class="col-md-4">
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
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 column backbtn">
                  <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
            </div>
        </div>
    </div>
</section>
@endsection