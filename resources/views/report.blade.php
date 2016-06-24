@extends('layouts.app')
@section('content')
<section class="container-fluid" id="report">
    <div class="row">
        <div class="col-sm-12 col-md-12 margintop40">
            <button type="button" class="btn btn-black buttonLeft" onclick="goBack();">
                <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i>
                 Zurück
            </button>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <article class="col-sm-12 col-md-12">
            	 <div class="col-sm-12 col-md-12 column questiontop">
                    <h3>Diesen Beitrag Melden:</h3>
                    {{$titel}} geschrieben am {{$date}} von {{$name}}
                </div>
                <div class="col-sm-12 col-md-12 column messagemain">
                    <div class="col-sm-2 col-md-2 column messageimg">
                        <img class="text-center avatar" src="/img/upload/avatar/{{ $avatar }}">
                    </div>
                    <div class="col-sm-10 col-md-10 column messagemain">
                        {!! nl2br(e($text)) !!}
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 column questionbot marginbottom20">
                    <div class="col-sm-12 col-md-12">
                        Bitte eine nachvollziehbare Begründung nennen
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 reportsuccess" id="success">
                    <h4>Vielen Dank für Ihre Nachricht. Unsere Moderatoren werden den Artikel so schnell wie möglich prüfen.</h4>
                    <div id="reportmessage">
                        Ihre Nachricht war:</br>
                    </div>
                </div>
            </article>
            <div class="col-sm-12 col-md-12 form-group" id="reportdiv">
                <div>Text muss mindestens 10 Zeichen lang sein</div>
                <textarea onkeyup="checkReport()" class="form-control" placeholder="Begründung" id="text" rows="6"></textarea>
                <button id="send" class="btn btn-black buttonRight margintop10" onclick="report('{{$id}}', '{{$value}}', '{{Auth::user()->name}}')" disabled="">
                     <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Abschicken
                 </button>
            </div>
        </div>
    </div>
</section>
@endsection