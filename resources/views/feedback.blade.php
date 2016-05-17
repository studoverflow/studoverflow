@extends('layouts.app')

@section('content')
<section id="feedback" class="container-fluid">
	<h1 class="text-center studoverflow">Feedback</h1>
	<h2 class="text-center studoverflow">Deine Meinung ist uns wichtig</h2>
	<section class="container">
		<article class="row">
			<div class="col-sm-12">
				<form class="form-group" action="" method="">
					<div class="col-sm-offset-2 col-sm-8 marginbottom5">
						<label>Name</label>
						<input class="form-control" type="text" name="name">
					</div>
					<div class="col-sm-offset-2 col-sm-8 marginbottom5">
						<label>E-Mail</label>
						<input class="form-control" type="text" name="email">
					</div>
					<div class="col-sm-offset-2 col-sm-8 marginbottom5">
						<label>Betreff</label>
						<input class="form-control" type="text" name="titel">
					</div>
					<div class="col-sm-offset-2 col-sm-8 marginbottom5">
						<label>Nachricht</label>
						<textarea class="form-control feedbackmassage" name="text"></textarea>
					</div>
					<div class="col-sm-offset-2 col-sm-8 margintop20">
						<input type="submit" class="btn btn-black">
					</div>
				</form>
			</div>
		</article>
	</section>
</section>
@endsection