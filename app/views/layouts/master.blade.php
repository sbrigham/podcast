<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src = '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"/>
    {{ HTML::style('css/blog.css'); }}
    {{ HTML::script('js/chosen.jquery.min.js'); }}
    {{ HTML::style('css/chosen.min.css'); }}
  </head>
  <body>
      <div class="blog-masthead">
        <div class="container">
            <nav class="blog-nav">
                <a class="blog-nav-item" href="/">Home</a>
                <a class="blog-nav-item" href="/blog">Blog</a>
            </nav>
        </div>
      </div>

    <div class="container">
        <div style="padding-top:10px">
            @yield('content')
        </div>
    </div>
  </body>
</html>