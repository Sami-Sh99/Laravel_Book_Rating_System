<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">LBook</a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="#">{{ Auth::user()->username }}</a></li>
                            <li><a href="#">Add Book</a></li>
                            <li><a href="#">Settings</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="footer">
            <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; Your Website 2018</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                    <a href="https://github.com/ELMORABITYounes">
                            <i class="fa fa-github"></i>
                        </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.facebook.com/younes.elmorabit.92">
                            <i class="fa fa-facebook"></i>
                        </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.linkedin.com/in/younes-elmorabit-2a162310b/">
                            <i class="fa fa-linkedin"></i>
                        </a>
                </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                <li class="list-inline-item">
                    <a href="#">Privacy Policy</a>
                </li>
                <li class="list-inline-item">
                    <a href="#">Terms of Use</a>
                </li>
                </ul>
            </div>
            </div>
        </footer>
  </div>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
    </html>