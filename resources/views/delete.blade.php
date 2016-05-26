@extends('layouts.app') 
@section('content')
<section class="container-fluid" id="delete">
    <article class="container">
        <article class="row">
            <div class="col-xs-12 col-md-12 column questiontop">
                <h3>Möchtest du diesen Beitrag von dir wirklich Löschen?</h3>
                LÖSCHEN von {{$titel}} geschrieben am {{$date}}
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
                <form class="marginbottom10" action="/delete{{$value}}" method="POST">
                    <button type="submit" class="btnquestions marginleft10"><i class="fa fa-btn fa-bolt" aria-hidden="true"></i> Unwiederruflich Löschen</button>
                    @if($value == "Question")
                    <input type="hidden" name="qid" value="{{$question_id}}">
                    @else
                    <input type="hidden" name="qid" value="{{$question_id}}">
                    <input type="hidden" name="aid" value="{{$answer_id}}">
                    @endif
                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
                </form>
                <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
            </div>
        </article>
    </article>
</section>
@endsection