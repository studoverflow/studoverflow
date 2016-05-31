@extends('layouts.app') 
@section('content')
<section class="container-fluid" id="question">

    <!-- Frage Bereich -->

    <article class="container">
        <article class="row">
            <div class="col-sm-12 col-md-12 column questiontop">
                <b>FRAGE:</b> {{$titel}} von <a href="/profile={{$user_id}}">{{$name}}</a> am {{$date}}
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
                @if(!Auth::guest())
                    @if(Auth::user()->rights == 'User')
                        @if(Auth::user()->id == $user_id)
                            <button onclick="window.location.href='/deleteQuestion={{$question_id}}'" class="btnquestions marginleft10"><i class="fa fa-trash"></i> Frage löschen</button> 
                        @endif
                    @endif
                        <button onclick="location.href='/answer={{$question_id}}'" class="btnquestions marginleft10"><i class="fa fa-arrow-right" aria-hidden="true"></i> Etwas zu dieser Frage schreiben</button>
                    @if(Auth::user()->id != $user_id)
                        <button onclick="location.href='/reportQuestion={{$question_id}}'" class="btnquestions marginleft10"><i class="fa fa-btn fa-bolt" aria-hidden="true"></i> Frage melden</button>
                    @endif
                @else
                    <button onclick="location.href='/register'" class="btnquestions marginleft10 backbtn"><i class="fa fa-arrow-right" aria-hidden="true"></i> Jetzt Mitglied werden und Antworten!</button>
                @endif
                @if(Auth::user()->rights == 'Admin' || Auth::user()->rights == 'Moderator')
                    <button onclick="window.location.href='/deleteQuestion={{$question_id}}'" class="btnquestions marginleft10"><i class="fa fa-trash"></i> Frage entfernen</button> 
                @endif
            </div>
        </article>
    </article>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 column backbtn">
                  <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
            </div>
        </div>
    </div>
  

    <!-- Antworten Bereich -->

    <?php $answer = DB::select('select * from answers where question_id = ?', [$question_id]); ?>
    @if($answer != null) 
        <?php $counter = null; ?>
        @foreach($answer as $out)
            <?php $usersanswer = App\User::find($out->user_id);  $counter++?>
            <article class="container">
                <article class="row">
                    <div class="col-sm-12 col-md-12 column messagetop">
                        <b>ANTWORT:</b> {{$out->titel}} von <a href="/profile={{$usersanswer->id}}">{{$usersanswer->name}}</a> am {{$out->date}}
                    </div>
                    <div class="col-sm-12 col-md-12 column messagemain">
                        <div class="col-sm-1 col-md-1 column messageimg">
                            <img class="text-center avatar" src="/img/upload/avatar/{{ $usersanswer->avatar }}">
                        </div>
                        <div class="col-sm-1 col-md-11 column messagemain">
                            <?php
                            echo nl2br($out->text);                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 column messagebot marginbottom15">
                    @if(!Auth::guest())
                        <!-- View für Frageersteller -->
                        @if(Auth::user()->id == $user_id)
                            @if(Auth::user()->id != $out->user_id)
                                <!-- Antworten Bewerten -->
                                @if($out->top == "1")
                                    <button id="starbtn{{$counter}}" onclick="top({{$out->id}})" class="btnquestions marginleft10 btntop"><i id="star{{$counter}}" class="fa fa-btn fa-star"></i> Hilfreiche Antwort</button>
                                @else
                                    <button id="starbtn{{$counter}}" onclick="top({{$out->id}})" class="btnquestions marginleft10 btntop"><i id="star{{$counter}}" class="fa fa-btn fa-star-o"></i> Hilfreiche Antwort</button>
                                @endif
                               <input type="hidden" value="$out->id" name="aid">
                               <button onclick="window.location.href='/reportAnswer={{$out->id}}'" class="btnquestions marginleft10"><i class="fa fa-bolt"></i> Antwort melden</button> 
                            @else
                                @if(Auth::user()->rights == 'User')
                                    <button onclick="window.location.href='/deleteAnswer={{$out->id}}'" class="btnquestions marginleft10"><i class="fa fa-trash"></i> Antwort löschen</button> 
                                @endif
                            @endif
                        @else
                        <!-- View für Andere User -->
                            @if($out->user_id == $user_id)
                                Frage Ersteller
                            @else
                                @if($out->top == "1")
                                    <i class="fa fa-star" aria-hidden="true"></i> {{$name}}, fand diese Antwort hilfreich
                                @else
                                    <i class="fa fa-btn fa-star-o"></i>
                                @endif
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $out->user_id)
                                        @if(Auth::user()->rights == 'User')
                                            <button onclick="window.location.href='/deleteAnswer={{$out->id}}'" class="btnquestions marginleft10"><i class="fa fa-trash"></i> Antwort löschen</button>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif
                        @if(Auth::user()->rights == 'Admin' || Auth::user()->rights == 'Moderator')
                            <button onclick="window.location.href='/deleteQuestion={{$question_id}}'" class="btnquestions marginleft10"><i class="fa fa-trash"></i> Antwort entfernen</button> 
                        @endif
                    @else
                        <!-- View für Gäste -->
                        @if($out->user_id == $user_id)
                            Frage Ersteller
                        @else
                            @if($out->top == "1")
                                <i class="fa fa-star" aria-hidden="true"></i> {{$name}}, fand diese Antwort hilfreich
                            @else
                                <i class="fa fa-btn fa-star-o"></i>
                            @endif
                        @endif
                    @endif

                    </div>
                </article>
            </article>
            <script type="text/javascript">
                var press = document.getElementById("starbtn{{$counter}}");
                if(press){
                    press.addEventListener("click", function (e) {
                    var target = document.getElementById("star{{$counter}}");
                    target.classList.toggle("fa-star");
                    target.classList.toggle("fa-star-o");
                    }, false);
                }
            </script>
        @endforeach
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 column backbtn marginbottom40">
                  <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
            </div>
        </div>
    </div>

    @else
        <div class="container marginbottom40">
            <div class="row">
                <div class="col-sm-12 col-md-12 column marginbottom40 margintop10">
                    <h1>Es sind noch keine Antworten vorhanden</h1>
                    
                </div>
            </div>
        </div>
    @endif

</section>
@endsection