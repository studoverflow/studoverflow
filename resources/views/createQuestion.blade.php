@extends('layouts.app')

@section('content')
<section id="createquestion" class="container-fluid">
	<article class="container" id="questiondiv">
        <h1 class="text-center studoverflow margintop80 marginbottom40"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Neue Frage erstellen</h1>
		<article class="row">
			<div class="col-sm-12 col-md-12">
			    <form class="form-group" action="/create" method="POST">
                    <div class="col-sm-12 col-md-12">
                       
                        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
                            <input class="form-control" placeholder="Titel" id="titel" name="titel" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 margintop15">
                        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">                            
                            <textarea class="form-control" placeholder="Deine Frage" id="text" name="text" cols="50" rows="10" id="message"></textarea>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 margintop15">
                        <div class="col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8">
                            <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
                            <input type="button" onclick="question()" class="btn btn-black messagebtn marginbottom40" value="Frage stellen">
                            <div class="col-sm-12 col-md-12 margintop10 notvalid" id="errordiv">
                                <h3 class="text-center">Ungültige Anfrage. Bitte zuerst alle Felder ausfüllen!</h3>
                            </div>
                        </div>
                    </div>
			    </form>
			</div>
		</article>
	</article>
    <article class="container" id="showquestion" style="display: none;">
        <article class="row">
            <div class="col-sm-12 col-md-12 column questiontop" id="createhead">
               {{Auth::user()->name}} am {{date("Y-m-d")}}
            </div>
            <div class="col-sm-12 col-md-12 column messagemain">
                <div class="col-sm-1 col-md-1 column messageimg">
                    <img class="text-center avatar" src="/img/upload/avatar/{{ Auth::user()->avatar }}">
                </div>
                <div class="col-sm-11 col-md-11 column messagemain" id="createmain">
                
                </div>
            </div>
            <div class="col-sm-12 col-md-12 column questionbot marginbottom20">
                <button onclick="window.location.href='/overview'" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zur Fragen Übersicht</button>
                <button onclick="window.location.href='/history'" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zu deiner History</button>
            </div>
        </article>
    </article>
    <article class="container text-center margintop40" id="showthumbs" style="display: none;">
        <article class="row">
            <div class="col-sm-12 col-md-12 column">
                <h1 class="marginbottom20">Vielen Dank für deine Frage</h1>
                <img src="/img/thumbs.png">
            </div>
        </article>
    </article>
</section>
@endsection