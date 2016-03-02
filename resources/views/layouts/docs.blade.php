<html>
<head>
	<meta charset="utf-8">
	<title>RAHASI</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Taylor Otwell">
	<meta name="description" content="RAHASI.">
	<meta name="keywords" content="RAHASI">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if lte IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="{!! url('assets/css/docs.css') !!}">
</head>
<body class="the-404
 language-php">
	<nav class="main">
		<div class="container">
			<a href="/" class="brand">
				RAHASI
			</a>

			<div class="responsive-sidebar-nav">
				<a href="#" class="toggle-slide menu-link btn">☰</a>
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
	<footer class="main">
		<p>. Copyright © Rahasi.</p>
		<p class="less-significant"><a href="http://rahasi.rw">Crafted RAHASI</a></p>
		 <script src="{{ url('assets/js/rahasi.js') }}"></script>
	</footer>
</body>
</html>