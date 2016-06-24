@extends('layouts.app')
@section('content')
 <section class="container-fluid" id="welcome">
    <article class="container">
        <article class="row">
            <article class="col-md-12 col-sm-12 marginbottom20">
                <div class="col-md-12 col-sm-12">
                    <h1 class="text-center studoverflowhead">
                        <span class="fa fa-stack-overflow" aria-hidden="true"></span> StudOverflow
                    </h1>
                @if(Auth::guest())
                    <p class="text-center">
                        <a type="button" href="/register" class="btn btn-black btn-lg btn-huge">
                            Jetzt Mitglied werden
                        </a>
                    </p>
                    <div class="col-sm-12 col-md-12 welcomeinfo">
                        <p>
                            <h3>
                                <i class="fa fa-info" aria-hidden="true"></i> Was ist StudOverflow?
                            </h3>
                        </p>
                        <p class="margintop20">
                            Jedes Semester stehen Studenten vor den gleichen Problemen.
                            Der eine hat Probleme mit dem Programmieren, der andere in Mathematik.
                        </p>
                        <p>
                            Vielleicht sind es auch nur allgemeine Fragen zum Studium, Studiengang oder Kurs.
                            Der Dozent wirft mit Fachbegriffen um sich oder erklärt etwas unnötig kompliziert?
                        </p>
                        <p>
                            In den Vorlesungen passiert es schnell, dass man nicht mehr mitkommt.
                            Unser Konzept basiert darauf, dass sich Studenten gegenseitig helfen.
                        </p>
                        <p>
                            Wir möchten den Studierenden eine Plattform schaffen, auf der ihre Fragen rund um das
                            Studium von Kommilitonen schnell und einfach beantwortet werden.
                        </p>
                    </div>
                </div>  
                @else
                    <?php $countquestions = DB::select('select count(*) as count from questions where user_id = ?', [Auth::user()->id]); ?>
                    <?php $countanswers = DB::select('select count(*) as count from answers where user_id = ?', [Auth::user()->id]); ?>
                    <?php $counttop = DB::select('select * from topanswers where user_id = ?', [Auth::user()->id]); ?>
                    <div class="col-sm-12 col-md-12">
                        <h3 class="text-center">
                            Willkommen {{ Auth::user()->name }}
                        <h3>
                    </div>
                    <div class="col-sm-12 col-md-12 welcomeinfo">
                        <div class="row paddingtop10">
                            <div class="col-sm-12 col-md-12">
                                <div class="col-sm-9 col-md-9">
                                    <h3>Deine Statistik</h3>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <button type="button" class="btn btn-black buttonRight" onclick="location.href='/create';">
                                        <i class="fa fa-btn fa-pencil"></i>
                                         Frage verfassen
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row borderBot borderTop borderPadding paddingtop10">
                           <div class="col-sm-12 col-md-12">
                                <div class="col-sm-6 col-md-6">
                                    Username
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    {{ Auth::user()->name }}
                                </div>
                           </div>
                        </div>
                        <div class="row borderBot borderPadding paddingtop10">
                            <div class="col-sm-12 col-md-12">                           
                                <div class="col-sm-6 col-md-6">
                                    gestellte Fragen
                                </div>
                                @foreach($countquestions as $question)
                                    @if($question->count != null)
                                        <div class="col-md-6 col-sm-6">
                                            {{ $question->count }}
                                        </div>
                                    @else
                                        <div class="col-sm-6 col-md-6">
                                            0
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="row borderBot borderPadding paddingtop10">
                           <div class="col-sm-12 col-md-12">                           
                                <div class="col-md-6 col-sm-6">
                                    gegebene Antworten
                                </div>
                                @foreach($countanswers as $answer)
                                    @if($answer->count != null)
                                        <div class="col-sm-6 col-md-6">
                                            {{ $answer->count }}
                                        </div>
                                    @else
                                        <div class="col-sm-6 col-md-6">
                                            0
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="row borderBot borderPadding paddingtop10">
                           <div class="col-sm-12 col-md-12">                           
                                <div class="col-sm-6 col-md-6">
                                    gegebene TOP Antworten
                                </div>
                                @if($counttop == null)
                                <div class="col-sm-6 col-md-6">
                                    0
                                </div>
                                @else
                                    @foreach($counttop as $top)
                                        @if($top->anzahl != 0)
                                            <div class="col-sm-6 col-md-6">
                                                {{ $top->anzahl }}
                                            </div>
                                        @else
                                            <div class="col-sm-6 col-md-6">
                                                0
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row borderBot borderPadding paddingtop10">
                           <div class="col-sm-12 col-md-12">                           
                                <div class="col-sm-6 col-md-6">
                                    Dein derzeitiger Rang
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    @if($counttop == null)
                                        Neuling
                                    @else
                                        @foreach($counttop as $top)                                   
                                            @if($top->anzahl == "1")
                                                Anfänger
                                            @endif
                                            @if($top->anzahl == "2")
                                                Helfer
                                            @endif
                                            @if($top->anzahl == "3")
                                                Sympathisant
                                            @endif
                                            @if($top->anzahl >= "4")
                                                Held
                                            @endif   
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </article>
        </article>
        <div class="row">
            <div class="text-center col-sm-12 col-md-12 marginbottom10">
                <div id="facebook" style="vertical-align: top; margin-right: 10px; margin-left: -5px" class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="recommend" data-show-faces="true" data-share="false"></div>
                <div id="google" class="g-follow" data-annotation="none" data-height="20" data-href="//plus.google.com/u/0/111031593308618237725" data-rel="publisher"></div>
                <script src="https://apis.google.com/js/platform.js" async defer>
                  {lang: 'de'}
                </script>
            </div>
        </div>
    </article>
</section>
@endsection