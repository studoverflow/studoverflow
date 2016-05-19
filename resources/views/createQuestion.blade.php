@extends('layouts.app')

@section('content')
<section id="feedback" class="container-fluid">
	<h1 class="text-center studoverflow">Neue Frage erstellen</h1>
	<section class="container">
		<article class="row">
			<div class="col-md-12">
			    <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <label>Betreff</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" placeholder="Betreff" name="betreff" type="text">
                        </div>
                    </div>
                    <div class="col-md-12 margintop15">
                        <div class="col-md-2">
                            <label>Frage</label>
                        </div>
                        <div class="col-md-8">                            
                            <textarea class="form-control" placeholder="Deine Frage" name="question" cols="50" rows="10" id="message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 margintop15">
                        <div class="col-md-offset-2 col-md-10">
                            <button onclick="location.href='/create';" type="submit" id="createQuestion" class="btn btn-primary">
                                <i class="fa fa-btn fa-pencil"></i> Frage stellen
                            </button>
                        </div>
                    </div>
			    </div>
			</div>
		</article>
	</section>
</section>
@endsection