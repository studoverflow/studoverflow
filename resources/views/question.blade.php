@extends('layouts.app') @section('content')
<section class="container-fluid" id="question">

    <!-- Frage Bereich -->

    <article class="container">
        <article class="row">
            <div class="col-xs-12 col-md-12 column questiontop">
                <b>FRAGE:</b> {{$titel}} von <a href="/profile={{$user_id}}">{{$name}}</a> am {{$date}}
            </div>
            <div class="col-xs-12 col-md-12 column messagemain">
                <div class="col-xs-3 col-md-1 column messageimg">
                    <img class="text-center avatar" src="/img/upload/avatar/{{ $avatar }}">
                </div>
                <div class="col-xs-9 col-md-11 column messagemain">
                    {{$text}}
                </div>
            </div>
            <div class="col-xs-12 col-md-12 column questionbot marginbottom20">
                <a href="#"><i class="fa fa-btn fa-bolt"></i> Frage melden</a>
            </div>
        </article>
    </article>

    <!-- Antworten Bereich -->

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                    @if ( $errors->count() > 0 )
                        <div class="col-sm-offset-2 col-sm-10">
                        <div class="alert alert-danger" role="alert">
                            <p>Leider sind folgende Fehler aufgetreten:</p>
                            <ul>
                                @foreach( $errors->all() as $message )
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    @endif
                    @if (Session::get('sendsuccess'))
                        <div class="col-sm-offset-2 col-sm-10">
                        <div class="alert alert-success" role="alert">Vielen Dank für die Antwort</div>
                        </div>
                    @endif
                    {!! Form::open(array('action' => 'QuestionController@answer', 'method' => 'post', 'class' => 'form-horizontal')) !!}
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                       
                        <div class="col-sm-12">
                            {!! Form::text('titel', '', array('class' => 'form-control', 'placeholder' => 'Titel')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                       
                        <div class="col-sm-12">
                            {!! Form::textarea('message', '', array('class' => 'form-control marginbottom5', 'placeholder' => 'Deine Nachricht')) !!}
                            {!! Form::hidden('question_id', '', array('class' => 'form-control marginbottom5', 'value' => '{{$question_id}}')) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        {!! Form::submit('Antworten', array('class' => 'btn btn-black messagebtn'));  !!}
                    </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>


    <?php $answer = DB::select('select * from answers where question_id = ?', [$question_id]); ?>
    @if($answer != null) 
        @foreach($answer as $out)
            <?php $usersanswer = App\User::find($out->user_id); ?>
            <article class="container">
                <article class="row">
                    <div class="col-xs-12 col-md-12 column messagetop">
                        <b>ANTWORT:</b> {{$out->titel}} von <a href="/profile={{$usersanswer->id}}">{{$usersanswer->name}}</a> am {{$out->date}}
                    </div>
                    <div class="col-xs-12 col-md-12 column messagemain">
                        <div class="col-xs-3 col-md-1 column messageimg">
                            <img class="text-center avatar" src="/img/upload/avatar/{{ $usersanswer->avatar }}">
                        </div>
                        <div class="col-xs-9 col-md-11 column messagemain">
                            {{$out->text}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 column messagebot marginbottom15">
                        <a href="#"><i class="fa fa-btn fa-star-o"></i> Hilfreichste Antwort</a>
                    </div>
                </article>
            </article>
        @endforeach
<!--         <div class="container marginbottom40">
            <div class="row">
                <div class="col-xs-12 col-md-12 column marginbottom5 margintop10">
                    <input type="button" class="btn btn-black messagebtn" value="Antworten">
                </div>
            </div>
        </div> -->
    @else
        <div class="container marginbottom40">
            <div class="row">
                <div class="col-xs-12 col-md-12 column marginbottom5 margintop10">
                    <h1>Es sind noch keine Antworten vorhanden</h1>
                    <h1>ToDo: Schöner machen wenn alle Funktionen laufen</h1>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection