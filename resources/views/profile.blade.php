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
                <div class="col-sm-9 col-md-9">
                    <div class="profil">                    
                        <div class="row" style="border-bottom: 1px solid #dddddd; border-top: 1px solid #dddddd; padding: 10px 0">
                            <div class="col-md-5">
                                <label>Username:</label>
                            </div>
                            <div class="col-md-7">
                                <label>{{ $name }}</label>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                            <div class="col-md-5">
                                <label>Rang:</label>
                            </div>
                            <div class="col-md-7">
                                <label>{{ $rights }}</label>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                            <div class="col-md-5">
                                <label>Name:</label>
                            </div>
                            <div class="col-md-7">
                                <label>{{ $forename }} {{ $surname }}</label>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                            <div class="col-md-5">
                                <label>E-Mail:</label>
                            </div>
                            <div class="col-md-7">
                                <label>{{ $email }}</label>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                            <div class="col-md-5">
                                <label>Hochschule:</label>
                            </div>
                            <div class="col-md-7">
                                <label>{{ $college }}</label>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                            <div class="col-md-5">
                                <label>Studiengang:</label>
                            </div>
                            <div class="col-md-7">
                                <label>{{ $course }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <div class="row">
        <div class="col-sm-12 col-md-12 column margintop10">
            <button onclick="goBack()" class="btnquestions backbtn marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
        </div>
    </div>
</section>
@endsection