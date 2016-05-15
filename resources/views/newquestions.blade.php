@extends('layouts.app')

@section('content')
<section class="container-fluid" id="new">
    <section class="container">
        <article class="row">
            <article class="col-sm-12">

                <div class="col-sm-12 questionheader">
                    <h1 class="text-center questionheaderfont">Neuste Fragen</h1>
                </div>
                    
                <div class="col-sm-12 questionblue">
                    <div class="col-sm-6">
                        <b><a href="/question"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Die Legendäre IF-Schleife</a></b>
                    </div>
                    <div class="col-sm-3">
                        <b><a href="/profile=2"><i class="fa fa-user" aria-hidden="true"></i> Enes</a></b>
                    </div>
                    <div class="col-sm-3">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> 4.04.2016 um 13:37
                    </div>
                </div>
                <div class="col-sm-12 questionwhite">
                    <div class="col-sm-6">
                        <b><a href="/question"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Die Legendäre IF-Schleife</a></b>
                    </div>
                    <div class="col-sm-3">
                        <b><a href="/profile=2"><i class="fa fa-user" aria-hidden="true"></i> Enes</a></b>
                    </div>
                    <div class="col-sm-3">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> 4.04.2016 um 13:37
                    </div>
                </div>
                    
            </article>
        </article>
        <!--/row-->
    </section>
    <!--/container-->
</section>
@endsection