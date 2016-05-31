@extends('layouts.app')

@section('content')
<section id="editArtikel" class="container-fluid">
	<article class="container" id="answerdiv">
        <h1 class="text-center studoverflow margintop80 marginbottom40"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Antwort Editieren</h1>
		<article class="row">
			<div class="col-sm-12 col-md-12">
			    <form class="form-group" action="/create" method="POST">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
                            <label>Titel</label>
                            <input class="form-control" id="titel" name="titel" type="text" value="{{ $titel }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 margintop15">
                        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">                            
                            <textarea class="form-control" id="text" name="text" cols="50" rows="10" id="message">{{ $text }}</textarea>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="qid" id="aid" value="{{$answer_id}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 margintop15">
                        <div class="col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8">
                            <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
                            <input type="button" onclick="editAnswer()" class="btn btn-black messagebtn marginbottom40" value="Editieren">
                            <div class="col-sm-12 col-md-12 margintop10 notvalid" id="errordiv">
                                <h3 class="text-center">Ungültige Anfrage. Bitte zuerst alle Felder ausfüllen!</h3>
                            </div>
                        </div>
                    </div>
			    </form>
			</div>
		</article>
	</article>
    <article class="container margintop80" id="editwork" style="display: none;">
        <h1 class="text-center"><i class="fa fa-check-square-o" aria-hidden="true"></i> Antwort erfolgreich editiert</h1>
        <article class="row">
            <div class="col-sm-12 col-md-12 column questiontop" id="createhead">
                {{Auth::user()->name}} editiert am {{date("Y-m-d")}} um {{date("H:i")}}
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
                <button onclick="window.location.href='/question={{$question_id}}'" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück zur Frage</button>
            </div>
        </article>
    </article>
</section>
@endsection