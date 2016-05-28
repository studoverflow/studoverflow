@extends('layouts.app')

@section('content')
<?php $questions = DB::select('select * from questions order by date desc'); ?>
<section class="container-fluid" id="new">
    <article class="container marginbottom80">
        <article class="row">
            <article class="col-sm-12 col-md-12">
                <div class="col-sm-12 col-md-12 questiontop">
                    <h1 class="text-center questionheaderfont">Neuste Fragen</h1>
                </div>
                @foreach($questions as $question)
                    <?php
                        $datecurr = date("Y-m-d");
                        $datetime1 = new DateTime($datecurr);
                        $datetime2 = new DateTime($question->date);
                        $interval = $datetime1->diff($datetime2);
                    ?>
                    @if($interval->format('%a') <= "15")
                    <?php $user = App\User::find($question->user_id); ?>
                    <div class="col-sm-12 col-md-12 question">
                        <div class="col-sm-6 col-md-6">
                            <b>
                                <a href="/question={{$question->id}}">
                                    <i class="fa fa-question-circle-o" aria-hidden="true"></i> 
                                    {{$question->titel}}
                                </a>
                            </b>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <b>
                                <a class="beforeiconxs" href="/profile={{$user->id}}">
                                    <i class="fa" aria-hidden="true">
                                        <img class="avatariconxs" src="/img/upload/avatar/{{ $user->avatar }}">
                                    </i> 
                                    {{$user->name}}
                                </a>
                            </b>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{$question->date}}
                        </div>
                    </div>
                    @endif
                @endforeach
            </article>
        </article>
    </article>
</section>
@endsection