@extends('layouts.app') 
@section('content')
<section class="container-fluid" id="delete">
    <div class="row">
        <div class="col-sm-12 col-md-12 margintop40">
            <button type="button" class="btn btn-black buttonLeft" onclick="goBack();">
                <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i>
                 Zurück
            </button>
        </div>
    </div>
    <article class="container">
        <article class="row">
            <div class="col-sm-12 col-md-12 column questiontop">
                <h3>Möchtest du diesen Beitrag wirklich Löschen?</h3>
                LÖSCHEN von {{$titel}} geschrieben am {{$date}}
            </div>
            <div class="col-sm-12 col-md-12 column messagemain">
                <div class="col-sm-1 col-md-1 column messageimg">
                    <img class="text-center avatar" src="/img/upload/avatar/{{ $avatar }}">
                </div>
                <div class="col-sm-9 col-md-11 column messagemain">
                    {!! nl2br(e($text)) !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12 column questionbot marginbottom20">
                <form class="marginbottom10" action="/delete{{$value}}" method="POST">
                    <button type="submit" class="btn btn-black marginleft10"><i class="fa fa-btn fa-bolt" aria-hidden="true"></i> Unwiederruflich Löschen</button>
                    @if($value == "Question")
                    <input type="hidden" name="qid" value="{{$question_id}}">
                    @else
                    <input type="hidden" name="qid" value="{{$question_id}}">
                    <input type="hidden" name="aid" value="{{$answer_id}}">
                    @endif
                    <input type="hidden" name="_token" value="{{ Session::token() }}" />
                </form>
            </div>
        </article>
    </article>
</section>
@endsection