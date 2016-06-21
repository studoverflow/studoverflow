/*
 * Table Of Content
 * 
 * 1. Answer
 * 2. goBack
 * 3. question
 * 4. report
 * 5. search
 * 6. top
 * 
 */


/**********
 * Answer *
 **********/
function answer(){
    var qid = document.getElementById('qid').value;
    var titel = document.getElementById('titel').value;
    var text = document.getElementById('text').value;
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

    if(text != "" && titel != ""){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var text = document.getElementById('text').value;
        console.log(titel);
        $.ajax({
            url: '/answer',
            type: 'POST',
            data: {_token: CSRF_TOKEN, qid: qid, titel: titel, text: text},
            dataType: 'JSON',
            success: function (data) {
            }
        });
        $("#showthumbs").show();
        $("#answerdiv").hide();
    } else {
        $("#errordiv").show();
    }
}

/**********
 * EDIT *
 **********/
function editQuestion(){
    var qid = document.getElementById('qid').value;
    var titel = $('#titel').val();
    var text = $('#text').val();
    console.log(text);
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

    if(text != "" && titel != ""){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var text = document.getElementById('text').value;
        console.log(titel);
        $.ajax({
            url: '/editQuestion',
            type: 'POST',
            data: {_token: CSRF_TOKEN, qid: qid, titel: titel, text: text},
            dataType: 'JSON',
            success: function (data) {
            }
        });
        $('#questiondiv').hide();
        $("#createhead").prepend("FRAGE: " + titel + " von ");
        text = text.replace(/\n/g, '<br>');
        $("#createmain").prepend(text);
        $('#editwork').show();
    } else {
        $("#errordiv").show();
    }
}

function editAnswer(){
    var aid = document.getElementById('aid').value;
    var titel = $('#titel').val();
    var text = $('#text').val();
    console.log(text);
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

    if(text != "" && titel != ""){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var text = document.getElementById('text').value;
        console.log(titel);
        $.ajax({
            url: '/editAnswer',
            type: 'POST',
            data: {_token: CSRF_TOKEN, aid: aid, titel: titel, text: text},
            dataType: 'JSON',
            success: function (data) {
            }
        });
        $('#answerdiv').hide();
        $("#createhead").prepend("ANTWORT: " + titel + " von ");
        text = text.replace(/\n/g, '<br>');
        $("#createmain").prepend(text);
        $('#editwork').show();
    } else {
        $("#errordiv").show();
    }
}

/**********
 * goBack *
 **********/
function goBack() {
    window.history.back();
}

/************
 * Question *
 ************/
function question(){
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var titel = document.getElementById('titel').value;
    var text = document.getElementById('text').value;

    console.log('Titel: ' + titel + ' Text: ' + text);

    if(text != "" && titel != ""){
        $.ajax({
            url: '/create',
            type: 'POST',
            data: {_token: CSRF_TOKEN, titel: titel, text: text},
            dataType: 'JSON',
            success: function (data) {
            }
        });
        $("#createhead").prepend("FRAGE: " + titel + " von ");
        text = text.replace(/\n/g, '<br>');
        $("#showthumbs").show();
        $("#questiondiv").hide();
    } else {
        $("#errordiv").show();
    }
}

/*******************
 * Register Checks *
 *******************/
function checkUsername(){
    var valueCount = document.getElementById('username').value.length;
    
    if (valueCount >= 3 && valueCount <= 12){        
        document.getElementById('username').setAttribute('style','border: 1px solid #2eb82e; opacity: 0.75');
        document.getElementById('register').disabled = false;
        document.getElementById('usernameHint').setAttribute('style','display:none');
    } else {
        document.getElementById('username').setAttribute('style','border: 1px solid #a94442; opacity: 0.75');
        document.getElementById('register').disabled = true;
        document.getElementById('usernameHint').setAttribute('style','display:block; margin: 5px 0 0 0; ');
    }
}

function validateEmail(){
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (regex.test(document.getElementById('email').value)){
        document.getElementById('email').setAttribute('style','border: 1px solid #2eb82e; opacity: 0.75');
        document.getElementById('emailHint').setAttribute('style','display:none');
    } else {
        document.getElementById('email').setAttribute('style','border: 1px solid #a94442; opacity: 0.75');
        document.getElementById('emailHint').setAttribute('style','display:block; margin: 5px 0 0 0; ');
    }    
}

/**********
 * Report *
 **********/
function report(id, value, user){
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var text = document.getElementById('text').value;
    var dataString = value + "-" + id + " wurde von " + user  + " mit der Nachricht: " + text + " gemeldet."
    console.log(dataString);
    if(text != ""){
        $.ajax({
            url: '/report',
            type: 'POST',
            data: {_token: CSRF_TOKEN, dataString: dataString},
            dataType: 'JSON',
            success: function (data) {
            }
        });
        text = text.replace(/\n/g, '<br>');
        $("#reportmessage").append(text);
        $("#reportdiv").hide();
        $("#success").show();
    } else {
        $("#errordiv").show();
    } 
}

/**********
 * Search *
 **********/
function search(){
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
            document.getElementById('suchbegriff').setAttribute('style', 'form-control');
            document.getElementById('suchbegriff').setAttribute('placeholder', 'Suchbegriff hier eingeben...');
            if (null != data){
                /* reset page */
                $("#searchResults").html("");            
                /* print the searchresults */
                for (var i = 0; i < data.length; i++){
                    var resultSet = data[i];
                    $( "#searchResults" )
                    .append('<div class="col-sm-12 col-md-12 question">' 
                                +'<div class="col-sm-6 col-md-6">'
                                    +'<b>' 
                                        +'<a href="/question=' + resultSet.id +'">'
                                            +'<i class="fa fa-question-circle-o" aria-hidden="true"></i> '
                                            + resultSet.titel
                                        +'</a>'
                                    +'</b>'
                                +'</div>'
                                +'<div class="col-sm-3 col-md-3">'
                                    +'<b>'
                                        +'<a class="beforeiconxs" href="/profile=' + resultSet.user_id + '">'
                                            + '<i class="fa" aria-hidden="true">'
                                            +'<img class="avatariconxs" src="/img/upload/avatar/' + resultSet.avatar + '"></i>' 
                                            + resultSet.name 
                                        + '</a>'
                                    +'</b>'
                                +'</div>'
                                +'<div class="col-sm-3 col-md-3">'
                                    +'<i class="fa fa-clock-o" aria-hidden="true"></i> '
                                    + resultSet.date
                                +'</div>'
                            +'</div>');
                }
            } else {
                document.getElementById('suchbegriff').setAttribute('style', 'form-control; background-color: #a94442');
                document.getElementById('suchbegriff').setAttribute('placeholder', 'Sie müssen einen Suchbegriff eingeben!!!');
            }
       }
    });
}

function searchEnter(){
    var txt = document.getElementById("suchbegriff");
    var button = document.getElementById("btnSearch");
    txt.addEventListener("keypress", function(event) {
        if (event.keyCode == 13)
            button.click();
    })
}

/*******
 * Top *
 *******/
function top(qid){
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = qid;
    $.ajax({
        url: '/question={{$question_id}}',
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: id},
        dataType: 'JSON',
        success: function (data) {
        }
    });
}