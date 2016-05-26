@extends('layouts.app') 
@section('content')
<section class="container-fluid" id="createanswer">

    <!-- Frage Bereich -->

    <article class="container">
        <article class="row">
            <div class="col-xs-12 col-md-12 column questiontop">
                <b>FRAGE:</b> {{$titel}} von <a href="/profile={{$user_id}}">{{$name}}</a> am {{$date}}
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


    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <form action="/answer={{$question_id}}" method="POST">
                    <div class="form-group">
                    </div>
                    <div class="form-group">           
                        <div class="col-sm-12 marginbottom10">
                            <input class="form-control" type="text" name="titel" placeholder="Titel">
                        </div>
                    </div>
                    <div class="form-group">       
                        <div class="col-sm-12 marginbottom20">
                            <textarea class="form-control"  name="text" placeholder="Nachricht" rows="10" ></textarea>
                            <input type="hidden" name="qid" value="{{$question_id}}">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-black messagebtn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection