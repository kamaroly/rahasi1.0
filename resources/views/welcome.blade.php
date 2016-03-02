<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>RAHASI</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Rahasi">
    <meta name="description" content="Rahasi.">
    <meta name="keywords" content="Rahasi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lte IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ url('assets/css/docs.css') }}">
    <link rel="apple-touch-icon" href="/favicon.png">
</head>
<body class="@yield('body-class', 'docs') language-php">

    <span class="overlay"></span>

    <nav class="main">
        <div class="container">
            <a href="/" class="brand">
                RAHASI
            </a>

            <div class="responsive-sidebar-nav">
                <a href="#" class="toggle-slide menu-link btn">&#9776;</a>
            </div>

            @if (Request::is('docs*') && isset($currentVersion))
                @include('partials.switcher')
            @endif

            <ul class="main-nav">
                @include('partials.main-nav')
            </ul>
        </div>
    </nav>

    @yield('content')


    <script src="{{ url('assets/js/rahasi.js') }}"></script>
   
</body>
</html>