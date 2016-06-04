@extends('layouts.app')

@section('content')
<section class="container-fluid" id="edit">
    <h1 class="text-center studoverflow margintop80">Profil anpassen</h1>
    <article class="container marginbottom80">
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
                                <div class="col-sm-12 col-md-12">
                                    <label>Profilbild ändern</label>
                                    <input type="file" name="avatar">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div class="row" style="border-bottom: 1px solid #dddddd; border-top: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-5">
                                    <b class="profil">Username</b>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control input-md" type="text" name="username" value="{{ Auth::user()->name }}" disabled="">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-5">
                                    <b class="profil">E-Mail</b>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control input-md" type="text" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-5">
                                    <b class="profil">Vorname</b>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control input-md" type="text" name="firstname" value="{{ Auth::user()->firstname }}">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-5">
                                    <b class="profil">Nachname</b>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control input-md" type="text" name="lastname" value="{{ Auth::user()->lastname }}">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-5">
                                    <b class="profil">Homepage</b>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control input-md" type="text" name="page" value="{{ Auth::user()->page }}">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-5">
                                    <b class="profil">Hochschule</b>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control input-md" type="text" name="college" value="{{ Auth::user()->college }}">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-5">
                                    <b class="profil">Studiengang</b>
                                </div>
                                <div class="col-md-7">
                                    <input class="form-control input-md" type="text" name="course" value="{{ Auth::user()->course }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 margintop10">
                            <input class="btn btn-primary" type="submit" value="Änderungen bestätigen" style="float:right">
                        </div>
                    </div>
                </form>
            </div>
        </article>
        <div class="row">
            <div class="col-sm-12 col-md-12 column">
                <button onclick="goBack()" class="btnquestions backbtn marginleft10">
                    <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> 
                    Zurück
                </button>
            </div>
        </div>
    </article>
</section>
@endsection