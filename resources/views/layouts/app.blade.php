<!DOCTYPE html>
<html lang="de">

<head>
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
    {{--
    <link href="{{ elixir('css/style.css') }}" rel="stylesheet"> --}}

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
                    <a class="navbar-brand" href="#section1">StudOverflow</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar-collapsible">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#section2">Neuste Fragen</a>
                        </li>
                        <li>
                            <a href="#section3">Beliebte Fragen</a>
                        </li>
                        <li>
                            <a href="#section4">Unbeantwortete Fragen</a>
                        </li>
                        <li>
                            <a href="#section5">Übersicht</a>
                        </li>
                        <li>
                            &nbsp;
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
<<<<<<< HEAD
                        @if (Auth::guest())
                        <li><a class="navbar-brand" href="{{ url('/login') }}">Login</a></li>
                        <li><a class="navbar-brand" href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
=======
                            @if (Auth::guest())
                                <li><a class="navbar-brand" href="#" data-toggle="modal" data-target="#login">Login</a></li>
                                <li><a class="navbar-brand" href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
>>>>>>> 50c6d959f3178965b3a4cc8a5ec2b7eb31562282
                </div>
            </div>
        </nav>
    </header>

    @yield('content')


    <footer class="container-fluid navbar-trans navbar-fixed-bottom" title="footer">
        <div class="container margintop15">
            <div class="row">
                <div class="col-xs-12 col-md-12 column">
                    <div id="footerfont">
                        <a href="#" data-toggle="modal" data-target="#impressum">Impressum </a> |
                        <a href="#" data-toggle="modal" data-target="#datenschutz">Datenschutz </a> |
                        <a href="#" data-toggle="modal" data-target="#rechtlicheHinweise">Rechtliche Hinweise</a>
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
    <script src="{{ elixir('js/app.js') }}"></script> --}}


</body>

</html>