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
</section>

@endsection