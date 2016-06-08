@extends('layouts.app')

@section('content')
<section class="container-fluid" id="new">
    <article class="container marginbottom80">
        <article class="row">
            <article class="col-sm-12 col-md-12">
                <div class="col-sm-12 col-md-12 questiontop">
                    <h1 class="text-center questionheaderfont">Neuste Fragen</h1>
                </div>
                <div class="col-sm-12 col-md-12 question">
                    <div class="col-sm-6 col-md-6">
                        Titel:
                    </div>
                    <div class="col-sm-3 col-md-3">
                        Autor:
                    </div>
                    <div class="col-sm-3 col-md-3">
                        Erstelldatum:
                    </div>
               </div>
               @foreach($questions as $question)
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
                                <a class="beforeiconxs" href="/profile={{$question->user_id}}">
                                    <i class="fa" aria-hidden="true">
                                        <img class="avatariconxs" src="/img/upload/avatar/{{ $question->avatar }}">
                                    </i> 
                                    {{$question->name}}
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
    </article>
</section>
@endsection