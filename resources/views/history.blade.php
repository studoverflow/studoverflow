@extends('layouts.app')
@section('content')
<section class="container-fluid" id="history">
    <article class="container marginbottom20">
        <article class="row">
            <article class="col-sm-12 col-md-12">
                <div class="col-sm-12 col-md-12 questiontop">
                    <h1 class="text-center questionheaderfont">Verlauf</h1>
                </div>
                <div class="col-sm-12 col-md-12 historyrow">
                    <h3 class="text-center">Fragen</h3>
                </div>
                @foreach($questions as $question)
                    <div class="col-sm-12 col-md-12 question">
                        <div class="col-sm-6 col-md-6">
                            <b>
                                <a href="/question={{$question->id}}">
                                    <i class="fa fa-question-circle-o" aria-hidden="true"></i> {{$question->titel}}
                                </a>
                            </b>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <b>
                                <a href="/profile={{Auth::user()->id}}">
                                    <i class="fa" aria-hidden="true">
                                        <img class="avatariconxs" src="/img/upload/avatar/{{Auth::user()->avatar}}">
                                    </i>
                                     {{Auth::user()->name}}
                                </a>
                            </b>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{$question->date}}
                        </div>
                    </div>
                @endforeach
                <div class="col-sm-12 col-md-12 historyrow">
                    <h3 class="text-center">Antworten</h3>
                </div>
                @foreach($answers as $answer) 
                    <div class="col-sm-12 col-md-12 question">
                        <div class="col-sm-6 col-md-6">
                            <b>
                                <a href="/question={{$answer->question_id}}">
                                    <i class="fa fa-question-circle-o" aria-hidden="true"></i> {{$answer->titel}}
                                </a>
                            </b>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <b>
                                <a href="/profile={{Auth::user()->id}}">
                                    <i class="fa" aria-hidden="true">
                                        <img class="avatariconxs" src="/img/upload/avatar/{{Auth::user()->avatar}}">
                                    </i>
                                     {{Auth::user()->name}}
                                </a>
                            </b>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{$question->date}}
                        </div>
                    </div>
                @endforeach
            </article>
        </article>
        <!--/row-->
    </article>
    <!--/container-->
</section>
@endsection