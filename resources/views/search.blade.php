@extends('layouts.app')

@section('content')
<section class="container-fluid" id="search">
    <h1 class="text-center studoverflow">Frage suchen</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form id="searchForm" class="form-group" action="/search">
                    <!-- Hidden Token Element -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- Inputfeld-->
                    <input type="text" id="suchbegriff" class="form-control" placeholder="Suchbegriff hier eingeben...">
                    <!-- Send Button-->
                    <input type="button" onclick="search()" value="Search..." class="btn btn-primary">
                </form>                    
            </div>
        </div>
        <div class="row">
            <div id="searchResults"></div>
        </div>
    </div>
</section>
@endsection