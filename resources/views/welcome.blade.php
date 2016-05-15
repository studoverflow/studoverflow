@extends('layouts.app')

@section('content')
<section class="container-fluid" id="welcome">
    <article class="v-center">
        <h1 class="text-center studoverflow"><i class="fa fa-stack-overflow" aria-hidden="true"></i>  StudOverflow</h1>
       	<h2 class="text-center lato animate slideInDown studoverflow">Das Studentenportal</h2>
       	</br>
       	@if(Auth::guest())
       	<p  class="text-center">
            <a type="button" href="/register" class="btn btn-black btn-lg btn-huge">jetzt Mitglied werden</a>
        </p>
        @else
       		<div class="text-center">
	       		<h1>Platzhalter du bist eingeloggt!!!!!!! ToDo!!!</h1>
	            <h1> Hier muss noch iwas gutes hin</h1>
	            <h1>lorem ipsum und so weisste bescheid ^_-</h1>
	            <h1>KEINE PANIK DIESER TEXT STEHT NUR DA WENN EINGELOGGT</h1>
       		</div>

        	
        @endif
    </article>
</section>
@endsection
