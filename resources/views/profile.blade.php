@extends('layouts.app')

@section('content')

<section class="container-fluid" id="profile">
    <h1 class="text-center">Profil @if (!Auth::guest()) <a href="#" class="editsize">Edit</a> @endif</h1> 
    <section class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <p><img class="profilpad" src="img/defpic.png">
                </p>
                <p>
                    <b>Rang:</b> Neuling
                </p>
                <p>
                    <b>Top-Antwort:</b> 0 mal
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
</section>
@endsection