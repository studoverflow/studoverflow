@extends('layouts.app')

@section('content')
<section class="container-fluid" id="edit">
    <h1 class="text-center studoverflow margintop80">Profil anpassen</h1>
    <article class="container">
        <article class="row">
            <div class="col-sm-offset-10 col-sm-10 col-md-offset-2 col-md-10">
                <form enctype="multipart/form-data" action="/editprofile" method="POST">
                    <div class="col-sm-4 col-md-4">
                        <p><img class="profilpad avatar" src="/img/upload/avatar/{{Auth::user()->avatar}}"></p>
                    </div>
                    <div class="col-sm-8 col-md-8">
                       <label>Profilbild ändern</label>
                       <input type="file" name="avatar">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <p><b class="profil">User </b></br>{{ Auth::user()->name }}</p>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <p><b class="profil">E-Mail</b></br>{{ Auth::user()->email }}</p>
                    </div>                  
                    <div class="col-sm-8 col-md-8">
                        <label>Email ändern</label>
                        <p><input class="form-control input-lg" type="text" name="email"></p>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <p><b class="profil">Vorname</b></br> {{ Auth::user()->firstname }}</p>
                    </div>                  
                    <div class="col-sm-8 col-md-8">
                        <label>Vorname ändern</label>
                        <p><input class="form-control input-lg" type="text" name="firstname"></p>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <p><b class="profil">Nachname</b></br> {{ Auth::user()->lastname }}</p>
                    </div>                  
                    <div class="col-sm-8 col-md-8">
                        <label>Nachname ändern</label>
                        <p><input class="form-control input-lg" type="text" name="lastname"></p>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <p><b class="profil">Homepage</b></br> {{ Auth::user()->page }}</p>
                    </div>                  
                    <div class="col-sm-8 col-md-8">
                        <label>Homepage ändern</label>
                        <p><input class="form-control input-lg" type="text" name="page"></p>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <p><b class="profil">Hochschule</b></br> {{ Auth::user()->college }}</p>
                    </div>                  
                    <div class="col-sm-8 col-md-8">
                        <label>Hochschule ändern</label>
                        <p><input class="form-control input-lg" type="text" name="college"></p>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <p><b class="profil">Studiengang</b></br> {{ Auth::user()->course }}</p>
                    </div>                  
                    <div class="col-sm-8 col-md-8">
                        <label>Studiengang ändern</label>
                        <p><input class="form-control input-lg" type="text" name="course"></p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <input class="btn btn-primary" type="submit" value="Änderungen bestätigen">

                    </div>
                    <div class="col-sm-6 col-md-6 column backbtn">
                        <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
                    </div>

                </form>
            </div>
        </article>
    </article>
</section>
@endsection