@extends('layouts.app')

@section('content')
<section class="container-fluid" id="search">
    <h1 class="text-center studoverflow">Frage suchen</h1>
    <div class="container">
        <div class="row">
            <form class="form-group" action="/create" method="POST">
                <div class="col-md-12">
                    <div class="col-md-8 col-md-offset-2">
                        <input class="form-control" placeholder="Suchbegriff hier eingeben..." name="suchbegriff" type="text" onkeyup="searchFor(this.value);">
                    </div>
                </div>
                <div class="col-md-12 margintop15">
                    <div class="col-md-offset-9 col-md-3">
                        <button onclick="location.href='/create';" type="submit" id="createQuestion" class="btn btn-primary">
                            <i class="fa fa-btn fa-pencil"></i> Suchen
                        </button>
                    </div>
                </div>
            </form>                                                       
        </div>
    </div>
</section>
@endsection