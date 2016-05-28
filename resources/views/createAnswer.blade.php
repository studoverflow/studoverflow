@extends('layouts.app') 
@section('content')
<section class="container-fluid" id="createanswer">

    <!-- Frage Bereich -->

    <article class="container">
        <article class="row">
            <div class="col-sm-12 col-md-12 column questiontop">
                <b>FRAGE:</b> {{$titel}} von <a href="/profile={{$user_id}}">{{$name}}</a> am {{$date}}
            </div>
            <div class="col-sm-12 col-md-12 column messagemain">
                <div class="col-sm-1 col-md-1 column messageimg">
                    <img class="text-center avatar" src="/img/upload/avatar/{{ $avatar }}">
                </div>
                <div class="col-sm-11 col-md-11 column messagemain">
                <?php
                 echo nl2br($text);
                ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 column questionbot marginbottom20">
                <button id="answerback" onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
            </div>
        </article>
    </article>
    <div class="container" id="answerdiv">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <form action="/answer={{$question_id}}" method="POST">
                    <div class="form-group">           
                        <div class="col-sm-12 col-md-12 marginbottom10">
                            <input class="form-control" type="text" id="titel" name="titel" placeholder="Titel">
                        </div>
                    </div>
                    <div class="form-group">       
                        <div class="col-sm-12 col-md-12 marginbottom20">
                            <textarea class="form-control"  name="text" id="text" placeholder="Nachricht" rows="10" ></textarea>
                            <input type="hidden" name="qid" id="qid" value="{{$question_id}}">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <input onclick="answer()" class="btn btn-black messagebtn marginbottom40" value="Antworten">
                    </div>
                </form>
                <div class="col-sm-12 col-md-12 margintop10 notvalid" id="errordiv">
                    <h2 class="text-center">Ungültige Anfrage. Bitte zuerst alle Felder ausfüllen!</h2>
                </div>
            </div>
        </div>
    </div>
    <article class="container" id="showanswer" style="display: none;">
        <article class="row">
            <div class="col-sm-12 col-md-12 column questiontop" id="createhead">
                
            </div>
            <div class="col-sm-12 col-md-12 column messagemain">
                <div class="col-sm-1 col-md-1 column messageimg">
                    <img class="text-center avatar" src="/img/upload/avatar/{{ $avatar }}">
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
    <article class="container text-center" id="showthumbs" style="display: none;">
        <article class="row">
            <div class="col-sm-12 col-md-12 column">
                <h1 class="marginbottom20">Vielen Dank für deine Antwort</h1>
                <img src="/img/thumbs.png">
            </div>
        </article>
    </article>
</section>
@endsection