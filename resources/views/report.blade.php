@extends('layouts.app')

@section('content')
<section class="container-fluid" id="report">
    <article class="container">
        <article class="row">
            <article class="col-md-12">
            	 <div class="col-xs-12 col-md-12 column questiontop">
                <h3>Diesen Beitrag Melden:</h3>
                {{$titel}} geschrieben am {{$date}} von {{$name}}
            </div>
            <div class="col-xs-12 col-md-12 column messagemain">
                <div class="col-xs-3 col-md-1 column messageimg">
                    <img class="text-center avatar" src="/img/upload/avatar/{{ $avatar }}">
                </div>
                <div class="col-xs-9 col-md-11 column messagemain">
                <?php
                 echo nl2br($text);
                ?>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 column questionbot marginbottom20">
                <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
            </div>
            </article>

        </article>
    </article>

    <article class="container" id="reportdiv">
        <article class="row">
            <article class="col-md-12">
                <textarea class="form-control" placeholder="Begründung" id="text" rows="6"></textarea>
                <button class="margintop10" onclick="test('{{$id}}', '{{$value}}', '{{Auth::user()->name}}')"> Abschicken</button>
            </article>
        </article>
    </article>


    <article class="container reportsuccess" id="success">
        <article class="row">
            <article class="col-md-12">
                Vielen Dank für Ihre Nachricht. Unsere Moderatoren werden den Artikel so schnell wie möglich prüfen.
            </article>
        </article>
    </article>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">

    function test(id, value, user){

        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var text = document.getElementById('text').value;
        var dataString = value + "-" + id + " wurde von " + user  + " mit der Nachricht: " + text + " gemeldet."
        console.log(dataString);
        $.ajax({
            url: '/report',
            type: 'POST',
            data: {_token: CSRF_TOKEN, dataString: dataString},
            dataType: 'JSON',
            success: function (data) {
            }
        });
        $("#reportdiv").hide();
        $("#success").show();
    }

    </script>



</section>

@endsection