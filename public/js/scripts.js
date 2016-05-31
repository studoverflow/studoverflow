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
 * ANSWER *
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
        $("#createhead").prepend("FRAGE: " + titel + " von ");
        text = text.replace(/\n/g, '<br>');
        $("#createmain").prepend(text);
        $("#answerdiv").hide();
        $("#answerback").hide();
        $('#showanswer').show();
        $("#showthumbs").show();
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

    if(text != "" && titel != ""){
        console.log(titel + " " + text);
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
        $("#createmain").prepend(text);
        $("#questiondiv").hide();
        $("#showquestion").show();
        $("#showthumbs").show();
    } else {
        $("#errordiv").show();
    }

}

/**********
 * Report *
 **********/
function checkForm(){
    valueCount = document.getElementById('username').value.length;
    
    if (valueCount >= 3 && valueCount <= 12){
        document.getElementById('username').setAttribute('style','border: 2px solid #2eb82e; opacity: 0.75');
    } else {
        document.getElementById('username').setAttribute('style','border: 2px solid #ff3300; opacity: 0.75');
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
            console.log(data);
            alert(data);

            var test = JSON.stringify(data).split('{');
            for (var i = 0; i < test.length; i++){
                console.log(test[i]);
            }
            
            var elements = test[1].split(',');
            for (var i = 1; i < elements.length; i++){
                console.log(elements[i]);
            }
       }
    });
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