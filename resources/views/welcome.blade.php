@extends('layouts.app')

@section('content')
@if(Auth::guest())
<section class="container-fluid" id="welcome">
    <section class="container">
        <article class="row">
            <article class="col-sm-12">
                <div class="col-sm-12 ">
                    <h1 class="text-center "><h1 class="text-center studoverflow">
                    <i class="fa fa-stack-overflow" aria-hidden="true"></i>  StudOverflow</h1></h1>
                                        <p class="text-center">
                        <a type="button" href="/register" class="btn btn-black btn-lg btn-huge">

                        jetzt Mitglied werden</a>
                    </p>
                </div>

                  
            </article>
        </article>
        <!--/row-->
    </section>
    <!--/container-->
</section>
@else
<section class="container-fluid" id="welcome">
    <section class="container">
        <article class="row">
            <article class="col-sm-12">
                <div class="col-sm-12 marginbottom20">
                    <h1 class="text-center "><h1 class="text-center studoverflow">
                    <i class="fa fa-stack-overflow" aria-hidden="true"></i>  StudOverflow</h1></h1>
                </div>
                  <div class="col-md-12 statsbox text-center">
                    <h1>Deine Statistik</h1>
                    <div class="col-md-6">User</div>
                    <div class="col-md-6">{{ Auth::user()->name }}</div>
                  </div>
            </article>
        </article>
        <!--/row-->
    </section>
    <!--/container-->
</section>
                @endif  

@endsection