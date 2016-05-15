@extends('layouts.app')

@section('content')
<section class="container-fluid" id="question">

    <!-- Frage Bereich -->

    <article class="container">
        <article class="row">
            <div class="col-xs-12 col-md-12 column questiontop">
                <b>FRAGE:</b> Die Legendäre IF-Schleife von <a href="/profile=2">Enes</a> am 04.04.2016
            </div>
            <div class="col-xs-12 col-md-12 column messagemain">
                <div class="col-xs-3 col-md-1 column messageimg">
                    <img class="text-center" src="img/defpic.png">
                </div>
                <div class="col-xs-9 col-md-11 column messagemain">
                    Hallo Zusammen,
                    <br /><br />
                    ich bin der Enes und Studieren Wirtschaftsinformatik.
                    <br />
                    Leider hab ich das mit der IF-SCHLEIFE noch nicht ganz verstanden.
                    <br />
                    Kann mir jemand helfen?
                    <br /><br />
                    Liebe grüße das Enes óO
                 </div>
            </div>

            <div class="col-xs-12 col-md-12 column questionbot">
                 <a href="#"><i class="fa fa-btn fa-bolt"></i> Frage melden</a>
            </div>
            <div class="col-xs-12 col-md-12 column marginbottom5 margintop10">
                <input type="button" class="btn btn-black messagebtn" value="Antworten">
            </div>     
        </article>
    </article>

    <!-- Antworten Bereich -->
    <!-- toDo Schleife die Antworten ausliest, wenn Table rdy -->

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h1 class="bold"></h1>
            </div>
        </div>
    </div>
     

    <article class="container">
        <article class="row">
            <div class="col-xs-12 col-md-12 column messagetop">
                <b>ANTWORT:</b> Gibt es nicht du LAPPEN von <a href="/profile=1">Stephen</a> am 04.04.2016
            </div>
            <div class="col-xs-12 col-md-12 column messagemain">
                <div class="col-xs-3 col-md-1 column messageimg">
                    <img class="text-center" src="img/defpic.png">
                </div>
                <div class="col-xs-9 col-md-11 column messagemain">
                    Hey Enes,
                    <br /><br />
                    Es gibt keine IF-SCHLEIFE...
                    <br />
                    Das nennt sich If-Anweisung :D
                    <br />
                    PS: http://www.if-schleife.de
                    <br /><br />
                    Stephen
                 </div>
            </div>
            <div class="col-xs-12 col-md-12 column messagebot">
                 <a href="#"><i class="fa fa-btn fa-star-o"></i> Hilfreichste Antwort</a>
            </div>    
        </article>
    </article>


</section>
@endsection