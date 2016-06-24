@extends('layouts.app')
@section('content')
<section class="container-fluid" id="edit">
    <div class="row">
        <div class="col-sm-12 col-md-12 margintop40">
            <button type="button" class="btn btn-black buttonLeft" onclick="goBack();">
                <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i>
                 Zurück
            </button>
         </div>
     </div>
    <h1 class="text-center">
        Profil anpassen
    </h1>
    <article class="container">
        <article class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                <form enctype="multipart/form-data" action="/editprofile" method="POST">
                    <div class="row">
                        <div class="col-md-3" align="center">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <img class="profilpad avatar" src="/img/upload/avatar/{{Auth::user()->avatar}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 margintop10">
                                    <label>Profilbild ändern</label>
                                    <input type="file" name="avatar">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-1 col-md-8 col-md-offset-1">
                            <div class="row borderBot borderTop borderPadding">
                                <div class="col-md-3">
                                    <b class="profil">Username:</b>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="username" value="{{ Auth::user()->name }}" disabled="">
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <b class="profil">E-Mail:</b>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <b class="profil">Vorname:</b>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="firstname" value="{{ Auth::user()->firstname }}">
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <b class="profil">Nachname:</b>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="lastname" value="{{ Auth::user()->lastname }}">
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <b class="profil">Homepage:</b>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="page" value="{{ Auth::user()->page }}">
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <b class="profil">Hochschule:</b>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="college" value="{{ Auth::user()->college }}">
                                </div>
                            </div>
                            <div class="row borderBot borderPadding">
                                <div class="col-md-3">
                                    <b class="profil">Studiengang:</b>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="course" value="{{ Auth::user()->course }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 margintop10">
                            <button class="btn btn-black buttonRight" type="submit" onclick="location.href='/profile';">
                                 bestätigen
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </article>
</section>
@endsection