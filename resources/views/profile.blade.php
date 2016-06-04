@extends('layouts.app')

@section('content')
<section class="container-fluid margintop40" id="profile">
    <h1 class="text-center studoverflow">Profil 
        @if (!Auth::guest() && Auth::user()->name == $name)
            <a href="/editprofile"" class="editsize" style="font-size: 12px">
                <span class="fa fa-btn fa-pencil"></span>
                edit
            </a> 
        @endif
    </h1>
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
    <article class="container margintop40">
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
                    <div class="col-sm-9 col-md-9">
                        <div class="profil">                    
                            <div class="row" style="border-bottom: 1px solid #dddddd; border-top: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-3">
                                    <label>Username:</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="username" value="{{ $name }}" disabled="">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-3">
                                    <label>Rang:</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="username" value="{{ $rights }}" disabled="">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-3">
                                    <label>Name:</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="username" value="{{ $forename }} {{ $surname }}" disabled="">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-3">
                                    <label>E-Mail:</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="username" value="{{ $email }}" disabled="">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-3">
                                    <label>Homepage:</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="username" value="{{ $page }}" disabled="">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-3">
                                    <label>Hochschule:</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="username" value="{{ $college }}" disabled="">
                                </div>
                            </div>
                            <div class="row" style="border-bottom: 1px solid #dddddd; padding: 10px 0">
                                <div class="col-md-3">
                                    <label>Studiengang:</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control input-md" type="text" name="username" value="{{ $course }}" disabled="">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 column margintop10">
                <button onclick="goBack()" class="btnquestions backbtn marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
            </div>
        </div>
    </article>
</section>
@endsection