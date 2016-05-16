@extends('layouts.app')

@section('content')
<section class="container" id="profile">
    <h1 class="text-center studoverflow">Profil anpassen</h1>
    <section class="container">
        <article class="row">
            <div class="col-md-offset-3 col-md-9">
                <form enctype="multipart/from-data" action="/profile/{{Auth::user()->id}}/edit" method="POST">
                    <div class="col-md-4">
                        <p><img class="profilpad" src="../../img/upload/avatar/{{Auth::user()->avatar}}"></p>
                    </div>
                    <div class="col-md-8">
                       <label>Profilbild ändern</label>
                       <input type="file" name="avatar">
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="col-md-12">
                        <p><b class="profil">User </b></br>{{ Auth::user()->name }}</p>
                    </div>
                    <div class="col-md-4">
                        <p><b class="profil">E-Mail</b></br>{{ Auth::user()->email }}</p>
                    </div>                  
                    <div class="col-md-8">
                        <p><input type="text" name="email" placeholder="E-Mail ändern"> <br><br><br></p>
                    </div>
                    <div class="col-md-4">
                        <p><b class="profil">Vorname</b></br> {{ Auth::user()->firstname }}</p>
                    </div>                  
                    <div class="col-md-8">
                        <p><input type="text" name="firstname" placeholder="Vorname ändern"><br><br><br></p>
                    </div>
                    <div class="col-md-4">
                        <p><b class="profil">Nachname</b></br> {{ Auth::user()->lastname }}</p>
                    </div>                  
                    <div class="col-md-8">
                        <p><input type="text" name="lastname" placeholder="Nachname ändern"><br><br><br></p>
                    </div>
                    <div class="col-md-4">
                        <p><b class="profil">Homepage</b></br> {{ Auth::user()->page }}</p>
                    </div>                  
                    <div class="col-md-8">
                        <p><input type="text" name="page" placeholder="Homepage ändern"><br><br><br></p>
                    </div>
                    <div class="col-md-4">
                        <p><b class="profil">Hochschule</b></br> {{ Auth::user()->college }}</p>
                    </div>                  
                    <div class="col-md-8">
                        <p><input type="text" name="college" placeholder="Hochschule ändern"><br><br><br></p>
                    </div>
                    <div class="col-md-4">
                        <p><b class="profil">Studiengang</b></br> {{ Auth::user()->course }}</p>
                    </div>                  
                    <div class="col-md-8">
                        <p><input type="text" name="course" placeholder="Studiengang ändern"><br><br><br></p>
                    </div>
                    <div class="col-md-12"><input type="submit" name="edit" value="Änderungen bestätigen"></div>


                </form>
            </div>
        </article>
    </section>
</section>
@endsection