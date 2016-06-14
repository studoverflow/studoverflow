@extends('layouts.app')

@section('content')
<section class="container-fluid" id="report">
    <article class="container">
        <article class="row">
            <article class="col-sm-12 col-md-12">
            	 <div class="col-sm-12 col-md-12 column questiontop">
                    <h3>Diesen Beitrag Melden:</h3>
                    {{$titel}} geschrieben am {{$date}} von {{$name}}
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
                    <button onclick="goBack()" class="btn btn-black marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
                </div>
                        <div class="col-sm-12 col-md-12 reportsuccess" id="success">
                <h4>Vielen Dank für Ihre Nachricht. Unsere Moderatoren werden den Artikel so schnell wie möglich prüfen.</h4>
                <div id="reportmessage">Ihre Nachricht war:</br></div>
        </div>
            </article>
        </article>
    </article>
    <div class="container" id="reportdiv">
        <article class="row">
            <article class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-12 col-md-12">
                            <textarea class="form-control" placeholder="Begründung" id="text" rows="6"></textarea>
                            <button class="margintop10 messagebtn btn-black" onclick="report('{{$id}}', '{{$value}}', '{{Auth::user()->name}}')"> Abschicken</button>
                            <div class="col-sm-12 col-md-12 margintop10 notvalid" id="errordiv">
                                <h2 class="text-center">Ungültige Anfrage. Bitte zuerst alle Felder ausfüllen!</h2>
                            </div>
                        </div>
                    </div>
            </article>
        </article>
    </div>
</section>
@endsection