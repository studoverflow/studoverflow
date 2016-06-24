@extends('layouts.app') 
@section('content')
<section class="container-fluid" id="createanswer">
    <div class="row">
        <div class="col-sm-12 col-md-12 margintop40">
            <button type="button" class="btn btn-black buttonLeft" onclick="window.location.href='/question={{$question_id}}'">
                <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i>
                 Zurück
            </button>
         </div>
     </div>
    <!-- Frage Bereich -->
    <div class="container">
        <article class="row">
            <div class="col-sm-12 col-md-12 column questiontop">
                <b>FRAGE:</b> {{$titel}} von <a href="/profile={{$user_id}}">{{$name}}</a> am {{$date}}
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
                <article class="paddingleft20 paddingright20">Guten Antworten können sich auf dein Rang auswirken.</article>
            </div>
            <form action="/answer={{$question_id}}" method="POST" id="answerdiv">         
                <div class="form-group"> 
                    <div>Titel muss zwischen 3 und 20 Zeichen lang sein</div>
                    <input onkeyup="checkPost()" class="form-control" type="text" id="titel" name="titel" placeholder="Titel">
                    <textarea onkeyup="checkPost()" class="form-control margintop10"  name="text" id="text" placeholder="Nachricht" rows="10" ></textarea>
                    <input type="hidden" name="qid" id="qid" value="{{$question_id}}">
                    <input type="hidden" id="_token" name="_token" value="{{{ csrf_token() }}}" />
                    <input id="send" type="button" onclick="answer()" class="btn btn-black buttonRight marginbottom20 margintop20" value="Antworten" disabled="">
                </div>
            </form>
        </article>

    <div class="container text-center displaynone" id="showthumbs">
        <div class="row">
            <article class="col-sm-12 col-md-12 column">
                <h1 class="marginbottom20">Vielen Dank für deine Antwort</h1>
                <img src="/img/thumbs.png" class="thumpsUpPic marginbottom20">
            </article>
        </div>
    </div>
</section>
@endsection