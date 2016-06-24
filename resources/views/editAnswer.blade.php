@extends('layouts.app')
@section('content')
<section id="editArtikel" class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 margintop40">
            <button type="button" class="btn btn-black buttonLeft" onclick="window.location.href='question={{$question_id}}'">
                <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i>
                 Zurück
            </button>
        </div>
    </div>
	<article class="container" id="answerdiv">
        <h1 class="text-center marginbottom20 topics"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Antwort Editieren</h1>
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
                            <input type="hidden" name="aid" id="aid" value="{{$answer_id}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 margintop15">
                        <div class="col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8">
                            <input type="button" onclick="editAnswer()" class="btn btn-black buttonRight marginbottom0" value="Editieren">
                            <div class="col-sm-12 col-md-12 margintop10 notvalid" id="errordiv">
                                <h3 class="text-center">Ungültige Anfrage. Bitte zuerst alle Felder ausfüllen!</h3>
                            </div>
                        </div>
                    </div>
			    </form>
			</div>
		</article>
	</article>
    <article class="container text-center displaynone" id="showthumbs">
        <article class="row">
            <div class="col-sm-12 col-md-12 column">
                <h1 class="marginbottom20">Erfolgreich geändert</h1>
                <img src="/img/thumbs.png" class="thumpsUpPic marginbottom20">
            </div>
        </article>
    </article>
</section>
@endsection