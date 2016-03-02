<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Taylor Otwell">
	<meta name="description" content="Laravel - The PHP framework for web artisans.">
	<meta name="keywords" content="laravel, php, framework, web, artisans, taylor otwell">
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

			
			<ul class="main-nav">
				<li class="nav-docs"><a href="/docs">Documentation</a></li>

			</ul>
		</div>
	</nav>		
	@yield('content')
	<footer class="main">
		<p>. Copyright © Rahasi.</p>
		<p class="less-significant"><a href="http://rahasi.rw">Crafted RAHASI</a></p>
	</footer>
</body>
</html>