@extends('layouts.app')

@section('content')
<section id="createquestion" class="container-fluid">
	<h1 class="text-center studoverflow">Neue Frage erstellen</h1>
	<section class="container">
		<article class="row">
			<div class="col-md-12">
			    <form class="form-group" action="/create" method="POST">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <label>Betreff</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" placeholder="Titel" name="titel" type="text">
                        </div>
                    </div>
                    <div class="col-md-12 margintop15">
                        <div class="col-md-2">
                            <label>Frage</label>
                        </div>
                        <div class="col-md-8">                            
                            <textarea class="form-control" placeholder="Deine Frage" name="text" cols="50" rows="10" id="message"></textarea>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                    </div>
                    <div class="col-md-12 margintop15">
                        <div class="col-md-offset-2 col-md-5">
                            <button onclick="location.href='/create';" type="submit" id="createQuestion" class="btn btn-primary">
                                <i class="fa fa-btn fa-pencil"></i> Frage stellen
                            </button>
                        </div>
                    </div>
			    </form>
                <div class="col-md-12 margintop20">
                    <button onclick="goBack()" class="btnquestions marginleft10"><i class="fa fa-btn fa-arrow-circle-left" aria-hidden="true"></i> Zurück</button>
                </div>
			</div>
		</article>
	</section>
</section>
@endsection