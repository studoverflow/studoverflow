@extends('layouts.app')

@section('content')
<section class="container-fluid" id="profile">
    <h1 class="text-center">Profil</h1>
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
                    <b class="profil">User </b></br>Enes
                </p>
                <p>
                    <b class="profil">Vorname</b>
                    </br>Enes
                </p>
                <p>
                    <b class="profil">Nachname</b>
                    </br>Mustermann
                </p>
                <p>
                    <b class="profil">E-Mail</b>
                    </br>enes@gmx.de
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <b class="profil">Homepage</b>
                    </br>www.enes.de
                </p>
                <p>
                    <b class="profil">Hochschule</b></br>HTWG-Konstanz (www.htwg-konstanz.de)
                </p>
                <p>
                    <b class="profil">Studiengang</b></br>Wirtschaftsinformatik
                </p>
            </div>
        </div>
    </section>
</section>
@endsection