@extends('layouts.app')

@section('content')
 <section class="container-fluid" id="welcome">
    <section class="container">
        <article class="row">
            <article class="col-xs-12">
                <div class="col-xm-12 ">
                    <h1 class="text-center studoverflow">
                        <span class="fa fa-stack-overflow" aria-hidden="true"></span>StudOverflow
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
                    <div class="col-md-12">
                        <h2 class="text-center">Willommen zurück {{ Auth::user()->name }}<h2>
                    </div>
                    <div class="col-md-12 statsbox text-center">
                        <h1 class="">Deine Statistik</h1>
                        <div class="col-md-6">User</div>
                        <div class="col-md-6">{{ Auth::user()->name }}</div>

                        <div class="col-md-6">gestellte Fragen</div>
                        @foreach($countquestions as $question)
                            @if($question->count != null)
                                <div class="col-md-6">{{ $question->count }}</div>
                            @else
                                <div class="col-md-6">0</div>
                            @endif
                        @endforeach

                        <div class="col-md-6">gegebene Antworten</div>
                        @foreach($countanswers as $answer)
                            @if($answer->count != null)
                                <div class="col-md-6">{{ $answer->count }}</div>
                            @else
                                <div class="col-md-6">0</div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </article>
        <!--/row
    </section>
    <!--/container-->
</section>
@endsection