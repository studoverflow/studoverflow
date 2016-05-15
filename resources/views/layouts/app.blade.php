<!DOCTYPE html>
<html lang="de">
    <head>

        <script type="text/javascript"> 
        var totalCount = 5;
        function ChangeIt() {
        var num = Math.ceil( Math.random() * totalCount );
        document.body.background = 'img/'+num+'.jpg';
        document.body.style.backgroundRepeat = "repeat";}
        </script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>StudOverflow</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Stephen Beck, Markus Jäckle">
        <meta name="description" content="Studoverflow ist ein Portal zum Informationsaustausch von Studenten">
        <meta name="email" content="info@studoverflow.de">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <!--
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        -->
        {{--<link href="{{ elixir('css/style.css') }}" rel="stylesheet">--}}

        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/animate.min.css" />
        <link rel="stylesheet" href="/css/styles.css" />
    </head>
    <body id="app-layout">
        <header>
            <nav class="navbar navbar-trans navbar-fixed-top navborderbot" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><i class="fa fa-stack-overflow" aria-hidden="true"></i> StudOverflow</a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbar-collapsible">
                        <ul class="nav navbar-nav navbar-left">
                            <li {{{ (Request::is('new') ? 'class=active' : '') }}}>
                                <a href="{{ url('/new') }}">Neue Fragen</a>
                            </li>
                            <li {{{ (Request::is('popular') ? 'class=active' : '') }}}>
                                <a href="{{ url('/popular') }}">Beliebte Fragen</a>
                            </li>
                            <li {{{ (Request::is('unanswered') ? 'class=active' : '') }}}>
                                <a href="{{ url('/unanswered') }}">Unbeantwortete Fragen</a>
                            </li>
                            <li {{{ (Request::is('overview') ? 'class=active' : '') }}}>
                                <a href="{{ url('/overview') }}">Übersicht</a>
                            </li>
                            <li {{{ (Request::is('search') ? 'class=active' : '') }}}>
                                <a href="{{ url('/search') }}">Suchen</a>
                            </li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li {{{ (Request::is('login') ? 'class=active' : '') }}}>
                                <a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in"></i> Anmelden</a>
                            </li>
                            <li {{{ (Request::is('register') ? 'class=active' : '') }}}>
                                <a href="{{ url('/register') }}"><i class="fa fa-btn fa-user"></i> Registrieren</a>
                            </li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle navbar-brand authnav" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-btn fa-universal-access"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/profile') }}"><i class="fa fa-btn fa-cog"></i> Profil</a>
                                    </li>
                                    <li>
                                        <a  href="{{ url('/ask') }}"><i class="fa fa-btn fa-pencil"></i> Frage verfassen</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-btn fa-paperclip"></i> Verlauf</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a>
                                    </li>

                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')

        <script type="text/javascript"> 
        ChangeIt();
        </script> 
        
        <footer class="container-fluid navbar-trans navbar-fixed-bottom">
            <div class="container margintop15">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="text-center scalefooter">
                            <a class="paddingright5" href="/imprint"><i class="fa fa-btn fa-pencil"></i> Impressum  </a>
                            <a class="paddingright5" href="/privacy"><i class="fa fa-btn fa-key"></i> Datenschutz</a> 
                            <a class="paddingright5" href="/legalnotice"><i class="fa fa-btn fa-info"></i> Rechtliche Hinweise</a>
                            <a href="/feedback"><i class="fa fa-btn fa-comment-o"></i> Feedback</a>
                        </div>
                    </div>
                </div>
                <!--/row-->
            </div>
            <!-- /container -->
        </footer>
        <!-- JavaScripts -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        {{--
        <script src="{{ elixir('js/app.js') }}"></script>
        --}}
    </body>
</html>