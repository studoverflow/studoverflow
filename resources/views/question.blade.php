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
                    <form action="/question={{$question_id}}" method="POST">
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                       
                        <div class="col-sm-12 marginbottom10">
                            <input class="form-control" type="text" name="titel" placeholder="Titel">
                        </div>
                    </div>
                    <div class="form-group">
                       
                        <div class="col-sm-12 marginbottom20">
                            <textarea class="form-control"  name="text" placeholder="Nachricht" rows="10" ></textarea>
                            <input type="hidden" name="qid" value="{{$question_id}}">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-black messagebtn">
                    </div>
                    </form>
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
                    
                </div>
            </div>
        </div>
    @endif
</section>
@endsection