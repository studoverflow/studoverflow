@extends('layouts.app') 
@section('content')
<section class="container-fluid" id="question">

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
                @if(!Auth::guest())
                    <button onclick="location.href='/answer={{$question_id}}'" class="btnquestions marginleft10"><i class="fa fa-arrow-right" aria-hidden="true"></i> Etwas zu dieser Frage schreiben</button>
                                    @if(Auth::user()->id != $user_id)
                    <button class="btnquestions marginleft10"><i class="fa fa-btn fa-bolt" aria-hidden="true"></i> Frage melden</button>
                @endif
                @else
                    <button onclick="location.href='/register'" class="btnquestions marginleft10"><i class="fa fa-arrow-right" aria-hidden="true"></i> Jetzt Mitglied werden und Antworten!</button>
                @endif
            </div>
        </article>
    </article>

    <!-- Antworten Bereich -->

    <?php $answer = DB::select('select * from answers where question_id = ?', [$question_id]); ?>
    @if($answer != null) 
        @foreach($answer as $out)
            <?php $usersanswer = App\User::find($out->user_id); ?>
            <article class="container">
                <article class="row">
                    <div class="col-xs-12 col-md-12 column messagetop">
                        <b>ANTWORT:</b> {{$out->titel}} von <a href="/profile={{$usersanswer->id}}">{{$usersanswer->name}}</a> am {{$out->date}}
                    </div>
                    <div class="col-xs-12 col-md-12 column messagemain">
                        <div class="col-xs-3 col-md-1 column messageimg">
                            <img class="text-center avatar" src="/img/upload/avatar/{{ $usersanswer->avatar }}">
                        </div>
                        <div class="col-xs-9 col-md-11 column messagemain">
                            <?php
                            echo nl2br($out->text);
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 column messagebot marginbottom15">
                    @if(!Auth::guest())
                        <!-- View für Frageersteller -->
                        @if(Auth::user()->id == $user_id)
                            @if(Auth::user()->id != $out->user_id)




                        @if($out->top == "1")
                            <button id="starbtn" onclick="top({{$out->id}})" class="btnquestions marginleft10 btntop"><i id="star" class="fa fa-btn fa-star"></i> Hilfreiche Antwort</button>
                        @else
                            <button id="starbtn" onclick="top({{$out->id}})" class="btnquestions marginleft10 btntop"><i id="star" class="fa fa-btn fa-star-o"></i> Hilfreiche Antwort</button>
                        @endif




                               <input type="hidden" value="$out->id" name="aid">
                               <button class="btnquestions marginleft10"><i class="fa fa-bolt"></i> Antwort melden</button> 
                            @else
                               <button class="btnquestions marginleft10"><i class="fa fa-trash"></i> Antwort löschen</button> 
                            @endif
                        @else
                        <!-- View für Andere User -->
                            @if($out->user_id == $user_id)
                                Frage Ersteller
                            @else
                                @if($out->top == "1")
                                    <i class="fa fa-star" aria-hidden="true"></i> {{$name}}, gefällt diese Antwort
                                @else
                                    <i class="fa fa-btn fa-star-o"></i>
                                @endif
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $out->user_id)
                                        <button class="btnquestions marginleft10"><i class="fa fa-trash"></i> Antwort löschen</button>     
                                    @endif
                                @endif
                            @endif
                        @endif
                    @else
                        <!-- View für Gäste -->
                        @if($out->user_id == $user_id)
                            Frage Ersteller
                        @else
                            @if($out->top == "1")
                                <i class="fa fa-star" aria-hidden="true"></i> {{$name}}, gefällt diese Antwort
                            @else
                                <i class="fa fa-btn fa-star-o"></i>
                            @endif
                        @endif
                    @endif

                    </div>
                </article>
            </article>
        @endforeach
    @else
        <div class="container marginbottom40">
            <div class="row">
                <div class="col-xs-12 col-md-12 column marginbottom5 margintop10">
                    <h1>Es sind noch keine Antworten vorhanden</h1>
                    
                </div>
            </div>
        </div>
    @endif

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script type="text/javascript">

    function top(qid){

        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
       
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        var id = qid;

        $.ajax({
            url: '/question={{$question_id}}',
            type: 'POST',
            data: {_token: CSRF_TOKEN, id: id},
            dataType: 'JSON',
            success: function (data) {
            }
        });
    }

        document.getElementById("starbtn").addEventListener("click", function (e) {
            var target = document.getElementById("star");
            target.classList.toggle("fa-star");
            target.classList.toggle("fa-star-o");
            }, false);
    



    </script>


    

</section>
@endsection