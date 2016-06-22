@extends('layouts.app')

@section('content')
<section id="feedback" class="container-fluid">
	<h1 class="text-center margintop40 topics"><i class="fa fa-btn fa-comment-o"></i> Feedback</h1>
	<h2 class="text-center marginbottom40">Deine Meinung ist uns wichtig</h2>
	<article class="container">
		<article class="row">
			<div class="col-sm-12 col-md-12"">
			    @if ( $errors->count() > 0 )
			        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
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
			        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
			        <div class="alert alert-success" role="alert">Wir haben Deine Nachricht erhalten. Vielen Dank dafür!</div>
			        </div>
			    @endif
			    {!! Form::open(array('action' => 'FeedbackController@feedback', 'method' => 'post', 'class' => 'form-horizontal')) !!}
			    <div class="form-group">
			        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
			            {!! Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Deine E-Mail Adresse')) !!}
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
			            {!! Form::text('titel', '', array('class' => 'form-control', 'placeholder' => 'Betreff')) !!}
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
			            {!! Form::textarea('message', '', array('class' => 'form-control', 'placeholder' => 'Deine Nachricht')) !!}
			        </div>
			    </div>
			    <div class="col-sm-offset-2 col-md-offset-2 col-sm-8 col-md-8">
			        {!! Form::submit('Senden', array('class' => 'btn btn-black buttonRight'));  !!}
			    </div>
			    {!! Form::close() !!}
			</div>
		</article>
	</article>
</section>
@endsection