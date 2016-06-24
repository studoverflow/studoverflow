@extends('layouts.app') 
@section('content')
<section class="container-fluid" id="question">
    <div class="row">
        <div class="col-sm-12 col-md-12 margintop40">
            <button type="button" class="btn btn-black buttonLeft" onclick="goBack();">
                <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i>
                 Zurück
            </button>
        </div>
    </div>
<!-- Frage Bereich -->
    <article class="container">
        <article class="row">
            <div class="col-sm-12 col-md-12 column questiontop">
                <b>FRAGE:</b> {{$titel}} von <a href="/profile={{$user_id}}">{{$name}}</a> am {{$date}}
            </div>
            <div class="col-sm-12 col-md-12 column messagemain">
                <div class="col-sm-2 col-md-2 column messageimg">
                    <img class="text-center avatar" src="/img/upload/avatar/{{ $avatar }}">
                </div>
                <div class="col-sm-10 col-md-10 column messagemain">
                @if($edit != null) Frage wurde editiert am {{ $edit }} </br></br>@endif 
                   {!! nl2br(e($text)) !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12 column questionbot marginbottom20">
                @if(!Auth::guest())
                    @if(Auth::user()->rights == 'User')
                        @if(Auth::user()->id == $user_id)
                            <button onclick="window.location.href='/deleteQuestion={{$question_id}}'" class="btn btn-black marginleft10">
                                <i class="fa fa-trash"></i>
                                 Löschen
                            </button> 
                        @endif
                    @endif
                    @if(Auth::user()->id == $user_id)
                        <button onclick="window.location.href='/editQuestion={{$question_id}}'" class="btn btn-black marginleft10">
                            <i class="fa fa-pencil-square-o"></i>
                             Editieren
                            </button>
                    @endif
                    @if(Auth::user()->rights == 'Admin' || Auth::user()->rights == 'Moderator')
                         <button onclick="window.location.href='/deleteQuestion={{$question_id}}'" class="btn btn-black marginleft10">
                            <i class="fa fa-trash"></i>
                             Entfernen
                            </button> 
                    @endif
                    <button onclick="location.href='/answer={{$question_id}}'" class="btn btn-black marginleft10">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                         Etwas zu dieser Frage schreiben
                        </button>
                    @if(Auth::user()->id != $user_id && Auth::user()->rights == 'User')
                        <button onclick="location.href='/reportQuestion={{$question_id}}'" class="btn btn-black marginleft10">
                            <i class="fa fa-btn fa-bolt" aria-hidden="true"></i>
                             Frage melden
                        </button>
                    @endif
                @else
                    <button onclick="location.href='/register'" class="btn btn-black marginleft10 backbtn">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                         Jetzt Mitglied werden!
                    </button>
                @endif
            </div>
        </article>
    </article>
<!-- Antworten Bereich -->
    @if($answers != null) 
        <?php $counter = null; ?>
        @foreach($answers as $out)
            <?php $counter++ ?>
            <article class="container">
                <article class="row">
                    <div class="col-sm-12 col-md-12 column messagetop">
                        <b>ANTWORT:</b> {!!$out->titel!!} von <a href="/profile={{$out->id}}">{{$out->name}}</a> am {{$out->date}}
                    </div>
                    <div class="col-sm-12 col-md-12 column messagemain">
                        <div class="col-sm-2 col-md-2 column messageimg">
                            <img class="text-center avatar" src="/img/upload/avatar/{{ $out->avatar }}">
                        </div>
                        <div class="col-sm-10 col-md-10 column messagemain">
                            @if($out->edit != null) 
                                Frage wurde editiert am {{ $out->edit }} </br></br>
                            @endif
                           {!! nl2br(e($out->text)) !!}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 column messagebot marginbottom15">
                    @if(!Auth::guest())
                        <!-- View für Frageersteller -->
                        @if(Auth::user()->id == $user_id)
                            @if(Auth::user()->id != $out->user_id)
                                <!-- Antworten Bewerten -->
                                @if($out->top == "1")
                                    <button id="starbtn{{$counter}}" onclick="topAnsw({{$out->id}})" class="btn btn-black marginleft10 btntop">
                                        <i id="star{{$counter}}" class="fa fa-btn fa-star"></i>
                                         Hilfreiche Antwort
                                     </button>
                                @else
                                    <button id="starbtn{{$counter}}" onclick="topAnsw({{$out->id}})" class="btn btn-black marginleft10 btntop">
                                        <i id="star{{$counter}}" class="fa fa-btn fa-star-o"></i>
                                         Hilfreiche Antwort
                                    </button>
                                @endif
                                <input type="hidden" value="$out->id" name="aid">
                                @if(Auth::user()->rights == 'User')
                                    <button onclick="window.location.href='/reportAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                        <i class="fa fa-bolt"></i>
                                        Antwort melden
                                    </button> 
                                @endif
                            @else
                                @if(Auth::user()->rights == 'User')
                                    <button onclick="window.location.href='/deleteAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                        <i class="fa fa-trash"></i>
                                                 Löschen
                                    </button>
                                    <button onclick="window.location.href='/editAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                        <i class="fa fa-pencil-square-o"></i>
                                         Editieren
                                    </button>
                                @endif
                            @endif
                        @else
                        <!-- View für Andere User -->
                            @if($out->user_id == $user_id)
                                <input type="hidden" value="$out->id" name="aid">
                                <i class="fa fa-reply paddingleft20" aria-hidden="true"></i> Fragesteller
                                @if(Auth::user()->rights == 'User')
                                    <button onclick="window.location.href='/reportAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                        <i class="fa fa-bolt"></i>
                                         Antwort melden
                                     </button> 
                                 @endif
                            @else
                                @if($out->top == "1")
                                    <i class="fa fa-star paddingleft20" aria-hidden="true"></i> 
                                     {{$name}}, fand diese Antwort hilfreich
                                @else
                                        <i class="fa fa-btn fa-star-o paddingleft20"></i>
                                @endif
                                @if(Auth::user()->id != $out->user_id && Auth::user()->rights == 'User')
                                    <button onclick="window.location.href='/reportAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                        <i class="fa fa-bolt"></i>
                                         Antwort melden
                                     </button>
                                @endif
                                @if(!Auth::guest() && Auth::user()->id == $out->user_id && Auth::user()->rights == 'User')
                                    <button onclick="window.location.href='/deleteAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                        <i class="fa fa-trash"></i>
                                         Löschen
                                    </button>
                                    <button onclick="window.location.href='/editAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                        <i class="fa fa-pencil-square-o"></i>
                                         Editieren
                                    </button> 
                                @endif
                            @endif
                        @endif
                        @if(Auth::user()->rights == 'Admin' || Auth::user()->rights == 'Moderator')
                            @if(Auth::user()->id == $out->user_id)
                                <button onclick="window.location.href='/editAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                    <i class="fa fa-pencil-square-o"></i>
                                    Editieren
                                 </button>
                            @endif 
                            <button onclick="window.location.href='/deleteAnswer={{$out->id}}'" class="btn btn-black marginleft10">
                                <i class="fa fa-trash"></i>
                                 Entfernen
                            </button> 
                        @endif
                    @else
                        <!-- View für Gäste -->
                        @if($out->user_id == $user_id)
                            <div class="col-sm-12 col-md-12">
                                <i class="fa fa-reply" aria-hidden="true"></i> Fragesteller
                            </div> 
                        @else
                            @if($out->top == "1")
                                <div class="col-sm-12 col-md-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                     {{$name}}, fand diese Antwort hilfreich
                                </div>  
                            @else
                                <div class="col-sm-12 col-md-12">
                                    <i class="fa fa-btn fa-star-o"></i>
                                </div>
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
    <div class="row">
        <div class="col-sm-12 col-md-12 margintop20 marginbottom20">
            <button type="button" class="btn btn-black buttonLeft" onclick="goBack();">
                <i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i>
                 Zurück
            </button>
        </div>
    </div>
    @else
        <div class="container marginbottom40">
            <div class="row">
                <div class="col-sm-12 col-md-12 column marginbottom40 margintop10">
                    <h3>Es sind noch keine Antworten vorhanden</h3>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection