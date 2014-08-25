<html ng-app="podcastApp">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Listen to Podcasts
    </title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src = '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"/>
</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"> Listen to Podcasts </a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
        @if(! Auth::check())
        <ul class="nav navbar-nav">
            <li> {{ HTML::link('/login', 'Login') }} </li>
        </ul>
        <ul class="nav navbar-nav">
            <li> {{ HTML::link('/register', 'Sign Up') }} </li>
        </ul>
        @else
        <ul class="nav navbar-nav">
            <li> {{ HTML::link('/logout', 'Logout') }} </li>
        </ul>
        @endif
    </div>
</div>

<div class="jumbotron" style="padding-top:15px">
    @include('flash::message')
    @yield('content')
</div>
</body>
</html>