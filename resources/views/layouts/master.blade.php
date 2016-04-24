<!DOCTYPE html>
<html>
<head>
    <title class="title">
	@yield('title', "Institute of Coaching Paper and Poster Submissions")
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="/ioc.css"  type="text/css" rel="stylesheet" />
    @yield('head')
</head>

<body id="app-layout">

  <div class="container">
    <header class="logo">
    <img src="/ioc_logo.gif" alt="IOC logo" >
    <br><br>
  </header>

    <nav class="navbar navbar-default">

          <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <ul class="nav navbar-nav ">
                    <!-- Authentication Links -->

                    @if (Auth::guest())
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href='/eligibility'>Eligibility</a></li>
                        <li><a href='/guidelines'>Guidelines</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href='/information'>Information</a></li>
                        <li><a href='/guidelines'>Guidelines</a></li>
                        <li><a href='/research/add'>Submit Entry</a></li>
                        <li><a href='/research/show'>Show/Edit Entry</a></li>
                        <li><a href='/research/delete'>Delete Entry</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                    @endif
                </ul>
            </div>
    </nav>



<div class='flash_message'> 	<br>  </div>

<section>
        @yield('content')
</section>

<br>


<footer class="footer">
	<p>© 2015 Copyright Institute of Coaching at McLean Hospital | 115 Mill Street, Belmont, MA 02478 | Phone: 800 381-4955 Fax: (617) 580-3965</p>
</footer>
<br>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
<script type="text/javascript" src="/ioc.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
	@yield('body')

</body>
</html>
