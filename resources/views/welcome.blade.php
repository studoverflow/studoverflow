@extends('layouts.app')

@section('content')
 <section class="container-fluid" id="welcome">
    <article class="container">
        <article class="row">
            <article class="col-xs-12">
                <div class="col-xm-12 ">
                    <h1 class="text-center studoverflow">
                        <span class="fa fa-stack-overflow" aria-hidden="true"></span> StudOverflow
                    </h1>
                @if(Auth::guest())
                    <p class="text-center">
                        <a type="button" href="/register" class="btn btn-black btn-lg btn-huge">
                            Jetzt Mitglied werden
                        </a>
                    </p>
                </div>  
                @else
                    <?php $countquestions = DB::select('select count(*) as count from questions where user_id = ?', [Auth::user()->id]); ?>
                    <?php $countanswers = DB::select('select count(*) as count from answers where user_id = ?', [Auth::user()->id]); ?>
                    <?php $counttop = DB::select('select * from topanswers where user_id = ?', [Auth::user()->id]); ?>
                <div class="col-md-12">
                    <h3 class="text-center">Willommen zurück {{ Auth::user()->name }}<h3>
                </div>
                <div class="col-md-12 statsbox text-center">
                    <div class="row">
                        <div class="col-md-12 statsrow">
                            <div class="col-md-10">
                                <h3>Deine Statistik</h3>
                            </div>
                            <div class="col-md-2">
                                <button onclick="location.href='/create';" type="submit" class="btn btn-primary btnRadius">
                                        <i class="fa fa-btn fa-pencil"></i> Frage verfassen
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12 statsrow">                           
                            <div class="col-md-6">
                                User
                            </div>
                            <div class="col-md-6">
                                {{ Auth::user()->name }}
                            </div>
                       </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12 statsrow">                           
                        <div class="col-md-6">
                            gestellte Fragen
                        </div>
                        @foreach($countquestions as $question)
                            @if($question->count != null)
                                <div class="col-md-6">{{ $question->count }}</div>
                            @else
                                <div class="col-md-6">0</div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12 statsrow">                           
                            <div class="col-md-6">gegebene Antworten</div>
                            @foreach($countanswers as $answer)
                                @if($answer->count != null)
                                    <div class="col-md-6">{{ $answer->count }}</div>
                                @else
                                    <div class="col-md-6">0</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12 statsrow">                           
                            <div class="col-md-6">gegebene TOP Antworten</div>
                            @if($counttop == null)
                                0
                                @else
                                @foreach($counttop as $top)
                                    @if($top->anzahl != 0)
                                        <div class="col-md-6">{{ $top->anzahl }}</div>
                                    @else
                                        <div class="col-md-6">0</div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12 statsrow">                           
                            <div class="col-md-6">Dein derzeitiger Rang</div>
                            <div class="col-md-6">
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
                @endif
            </article>
    </article>
</section>
@endsection