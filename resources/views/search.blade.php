@extends('layouts.app')

@section('content')
<?php $questions = DB::select('select * from questions order by date desc'); ?>
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
<!--
            <div class="col-md-12 margintop15">
                <button type="button" class="btn btn-warning" id="searchResults"> Suchen... </button>
            </div>
-->
            <div id="searchResultsData">
                
            </div>

            <div id="postResultsData">
                
            </div>


        </div>
    </div>
</section>
@endsection

<script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript">


    // $(document).ready(function(){

    //     $('#searchForm').submit(function(){
    //         var suchb = $('#suchbegriff').val();

    //         $.post('searchForm', { suchbegriff:suchb }, function(data){
    //             console.log(data);
    //             $('#postResultsData').html(data);
    //         })
    //     });

function search(){
    var test = "";
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

        var suchbegriff = document.getElementById('suchbegriff').value;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({

            url: '/search',
            type: 'POST',
            data: {_token: CSRF_TOKEN, suchbegriff: suchbegriff},
            dataType: 'JSON',
            success:function(data) {

                console.log(data);
                
            }
        });
        
}

/*        $.ajax({
            type: "POST",
            url: "searchForm",
            data: dataString;
        });
*/

/*
        $(document).ready(function(){
            $("#searchResults").click(function(){
               $.get('searchResults', function(data){
                   $('#searchResultsData').append(data);
                   console.log(data);
               });
            });
        });
    */    
    // });
</script>