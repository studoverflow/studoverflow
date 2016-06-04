@extends('layouts.app')

@section('content')
<section class="container-fluid" id="search">
    <h1 class="text-center margintop80 marginbottom40">
        <i class="fa fa-btn fa-search"></i>
        Suchen
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="input-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" id="suchbegriff" onkeyup="searchEnter()" class="form-control" placeholder="Suchbegriff hier eingeben...">
                    <span class="input-group-btn">
                        <button id="btnSearch" onclick="search();" class="btn btn-default searchButton" type="button" value="Search...">
                        <i class="fa fa-btn fa-search"></i>
                    </button>
                  </span>
                </div><!-- /input-group -->
            </div>
        </div>
        <div class="row">
            <div class="margintop20">
                <div class="col-sm-12 col-md-12 question questiontop">
                  <div class="col-sm-6 col-md-6">Titel</div>
                  <div class="col-sm-3 col-md-3">Autor</div>
                  <div class="col-sm-3 col-md-3">Erstelldatum</div>
               </div>
               <div id="searchResults">
                   
               </div>
            </div>
        </div>
    </div>
</section>
@endsection