<!DOCTYPE html>
<html lang="de">
<head>
    <script type="text/javascript">
        var totalCount = 5;
        function ChangeIt() {
            var num = Math.ceil(Math.random() * totalCount);
            document.body.background = 'img/' + num + '.jpg';
            document.body.style.backgroundRepeat = "repeat";
        }
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
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    {{--<link href="{{ elixir('css/style.css') }}" rel="stylesheet">--}}

<!--
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
-->
    <link rel="stylesheet" href="/css/styles.css" />
</head>
<body id="app-layout">
    <header class="scaleheader test">
        <nav class="navbar navbar-trans navbar-fixed-top navborderbot" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <span class="fa fa-stack-overflow" aria-hidden="true"></span> StudOverflow
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbar-collapsible">
                    <ul class="nav navbar-nav navbar-left">
                        <li {{{ (Request::is( 'overview') ? 'class=active' : '') }}}>
                            <a href="{{ url('/overview') }}">Übersicht</a>
                        </li>
                    <!-- NEU -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"">
                                Fragen<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li {{{ (Request::is( 'new') ? 'class=active' : '') }}}>
                                    <a href="{{ url('/new') }}">Neue Fragen</a>
                                </li>
                                <li {{{ (Request::is( 'popular') ? 'class=active' : '') }}}>
                                    <a href="{{ url('/popular') }}">Beliebte Fragen</a>
                                </li>
                                <li {{{ (Request::is( 'unanswered') ? 'class=active' : '') }}}>
                                    <a href="{{ url('/unanswered') }}">Unbeantwortete Fragen</a>
                                </li>
                            </ul>
                        </li>
                        <li {{{ (Request::is( 'search') ? 'class=active' : '') }}}>
                            <a href="{{ url('/search') }}">
                                <span class="fa fa-btn fa-search" aria-hidden="true"></span> Suche
                            </a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li {{{ (Request::is( 'login') ? 'class=active' : '') }}}>
                            <a href="{{ url('/login') }}">
                                <span class="fa fa-btn fa-sign-in"></span> Anmelden
                            </a>
                        </li>
                        <li {{{ (Request::is( 'register') ? 'class=active' : '') }}}>
                            <a href="{{ url('/register') }}">
                                <span class="fa fa-btn fa-user"></span> Registrieren
                            </a>
                        </li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="beforeicon dropdown-toggle navbar-brand authnav" data-toggle="dropdown" aria-expanded="true"">
                                <img class="avatariconmenu" src="/img/upload/avatar/{{ Auth::user()->avatar }}"> {{ Auth::user()->name }} 
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/profile') }}">
                                        <span class="fa fa-btn fa-cog"></span> Profil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/create') }}">
                                        <span class="fa fa-btn fa-pencil"></span> Frage verfassen
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/history') }}">
                                        <span class="fa fa-btn fa-paperclip"></span> Verlauf
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}">
                                        <span class="fa fa-btn fa-sign-out"></span> Logout
                                    </a>
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
                        <a class="paddingright20" href="/imprint">
                            <i class="fa fa-btn fa-paragraph"></i>
                             Impressum
                        </a>
                        <a class="paddingright20" href="/privacy">
                            <i class="fa fa-btn fa-key"></i>
                             Datenschutz
                        </a>
                        <a class="paddingright20" href="/legalnotice">
                            <i class="fa fa-btn fa-info"></i>
                             Rechtliche Hinweise
                        </a>
                        <a href="/feedback">
                            <i class="fa fa-btn fa-comment-o"></i>
                             Feedback
                        </a>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
        <!-- /container -->
    </footer>
    <!-- JavaScripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    {{--
        <script src="{{ elixir('js/app.js') }}"></script>
    --}}

<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.6";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

    {{--
        <script src="{{ elixir('js/app.js') }}"></script>
    --}}
</body>
</html>