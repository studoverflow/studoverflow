@extends('layouts.app')

@section('content')
@if(Auth::guest())
<section class="container-fluid" id="welcome">
    <section class="container">
        <article class="row">
            <article class="col-sm-12">
                <div class="col-sm-12 ">
                    <h1 class="text-center "><h1 class="text-center studoverflow">
                    <i class="fa fa-stack-overflow" aria-hidden="true"></i>  StudOverflow</h1></h1>
                                        <p class="text-center">
                        <a type="button" href="/register" class="btn btn-black btn-lg btn-huge">

                        jetzt Mitglied werden</a>
                    </p>
                </div>  
            </article>
        </article>
        <!--/row-->
    </section>
    <!--/container-->
</section>
@else
<?php $countquestions = DB::select('select count(*) as count from questions where user_id = ?', [Auth::user()->id]); ?>
<?php $countanswers = DB::select('select count(*) as count from answers where user_id = ?', [Auth::user()->id]); ?>
<section class="container-fluid" id="welcome">
    <section class="container">
        <article class="row">
            <article class="col-sm-12">
                <div class="col-sm-12 marginbottom20">
                    <h1 class="text-center "><h1 class="text-center studoverflow">
                    <i class="fa fa-stack-overflow" aria-hidden="true"></i>  StudOverflow</h1></h1>
                </div>
                <div col-md-12><h2 class="studoverflow text-center">Willommen zurück {{ Auth::user()->name }}<h2></div>
                <div class="col-md-12 statsbox text-center">
                    <h1 class="studoverflow">Deine Statistik</h1>
                    <div class="col-md-6">User</div>
                    <div class="col-md-6">{{ Auth::user()->name }}</div>
                    <div class="col-md-6">Email</div>
                    <div class="col-md-6">{{ Auth::user()->email }}</div>

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
            </article>
        </article>
        <!--/row-->
    </section>
    <!--/container-->
</section>
                @endif  

@endsection