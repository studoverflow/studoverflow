@extends('layouts.app')

@section('content')
<?php 
$questions = DB::select('select * from questions order by date desc'); 
$answers = DB::select('select * from countanswer');
?>
<section class="container-fluid" id="new">
    <section class="container">
        <article class="row">
            <article class="col-sm-12">
                <div class="col-sm-12 questionheader">
                    <h1 class="text-center questionheaderfont">Beliebte Fragen</h1>
                </div>
                @foreach($answers as $answer)
                    @foreach($questions as $question)
                        @if($answer->anzahl > 0 && $answer->id==$question->id)
                            <?php $user = App\User::find($question->user_id); ?>
                            <div class="col-sm-12 question">
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
                        @endif
                    @endforeach
                @endforeach
            </article>
        </article>
        <!--/row-->
    </section>
    <!--/container-->
</section>
@endsection