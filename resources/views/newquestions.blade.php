@extends('layouts.app')

@section('content')
<?php $questions = App\Question::all(); ?>
<section class="container-fluid" id="new">
    <section class="container">
        <article class="row">
            <article class="col-sm-12">
                <div class="col-sm-12 questionheader">
                    <h1 class="text-center questionheaderfont">Neuste Fragen</h1>
                </div>
                
                    @foreach($questions as $question)
                        <?php $user = App\User::find($question->user_id); ?>
                        <div class="col-sm-12 questionblue">
                            <div class="col-sm-6">
                                <b><a href="/question={{$question->id}}">
                                <i class="fa fa-question-circle-o" aria-hidden="true"></i> 
                                {{$question->titel}}
                                </a></b>
                            </div>
                            <div class="col-sm-3">
                                <b><a href="/profile={{$user->id}}"><i class="fa fa-user" aria-hidden="true"></i> {{$user->name}}</a></b>
                            </div>
                            <div class="col-sm-3">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$question->date}}
                            </div>
                        </div>
                    @endforeach
                    
<!--                 <div class="col-sm-12 questionwhite">
                    <div class="col-sm-6">
                        <b><a href="/question"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Die Legendäre IF-Schleife</a></b>
                    </div>
                    <div class="col-sm-3">
                        <b><a href="/profile=2"><i class="fa fa-user" aria-hidden="true"></i> Enes</a></b>
                    </div>
                    <div class="col-sm-3">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> 4.04.2016 um 13:37
                    </div>
                </div> -->

            </article>
        </article>
        <!--/row-->
    </section>
    <!--/container-->
</section>
@endsection