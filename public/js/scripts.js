
function goBack() {
    window.history.back();
}

function top(qid){

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
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

function report(id, value, user){

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
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

function answer(){

    var qid = document.getElementById('qid').value;
    var titel = document.getElementById('titel').value;
    var text = document.getElementById('text').value;

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
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

function question(){

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
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

// Scroll animation
/*

$('body').scrollspy({
  target: '#navbar-collapsible',
  offset: 52
});
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 50
        }, 800);
        
        if (this.hash=="#section1") {
            $('.scroll-up').hide();
        }
        else {
            $('.scroll-up').show();
        }
                
        target.find('.animate').delay(1200).addClass("animated");
        setTimeout(function(){
            target.find('.animated').removeClass("animated");
        },2000);
        
        return false;
      }
    }
});

*/

// Overlay login close

/*

function closeLogin(){
	$('#login').modal('hide');
};




// Registration
function registrationEvent(name){


    switch(name){
        case "username":
            regUsername(document.getElementById('username').value);
            break;
        case "email":
            regEmail(document.getElementById('email').value);
            break;
        case "bemail":
            regbEmail(document.getElementById('bemail').value);
            break;
        case "passwort":
            regPasswort(document.getElementById('passwort').value);
            break;
        case "bpasswort":
            regbPasswort(document.getElementById('bpasswort').value);
            break;

    }
}

function clearField(args){

    var element = document.getElementById(args);

    var errTextmail = document.getElementById("emailErr");
    var errTextBmail = document.getElementById("emailbErr");

    if(args == email){
        errTextmail.innerHTML = "";
    } else {
        errTextBmail.innerHTML = "";
    }

        element.classList.remove("fieldgreen");
        element.classList.remove("fieldred");



}

function regUsername(args){
    var element = document.getElementById("username");
    var errText = document.getElementById("usernameErr");

     var regex =  new RegExp('[a-zA-Z]*', 'i');

    if(args.length >= 3 && (args.match(regex) == args)){
            console.log(args.match(regex));
            element.classList.remove("fieldred");
            element.classList.add("fieldgreen");
            errText.innerHTML = "";
    } else {
            element.classList.remove("fieldgreen");
            element.classList.add("fieldred");
            errText.innerHTML = "Mindestlänge 3 Buchstaben ohne Zahlen und Sonderzeichen.";
    }
    if(args.length == 0) {
        element.classList.remove("fieldgreen");
        element.classList.remove("fieldred");
        errText.innerHTML = "";
    }

}

function regEmail(args){

    var element = document.getElementById("email");
    var errText = document.getElementById("emailErr");

    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    console.log(regex.test(args))
    if(regex.test(args)){
        element.classList.remove("fieldred");
        element.classList.add("fieldgreen");
        errText.innerHTML = "";
    } else {
        element.classList.remove("fieldgreen");
        element.classList.add("fieldred");
        errText.innerHTML = "E-Mail ist nicht zulässig.";
    }
    if(args.length == 0 || onfocus){
        element.classList.remove("fieldgreen");
        element.classList.remove("fieldred");
        errText.innerHTML = "";
    }


}

function regbEmail(args){

    var valueEMail = document.getElementById('email').value
    var element = document.getElementById("bemail");
    var errText = document.getElementById("emailbErr");

    if(args == valueEMail){
        element.classList.remove("fieldred");
        element.classList.add("fieldgreen");
        errText.innerHTML = "";
    } else {
        element.classList.remove("fieldgreen");
        element.classList.add("fieldred");
        errText.innerHTML = "E-Mail ist unterschiedlich.";
    }
    if(args.length == 0 ){
        element.classList.remove("fieldgreen");
        element.classList.remove("fieldred");
        errText.innerHTML = "";
    }
*/