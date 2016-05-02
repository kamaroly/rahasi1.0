<html lang="en">
	<meta name="google-site-verification" content="mfGlZGn127qk5Qu0rhg3icB8S4yzsDiPGUOxFDGyTQ4" />
@include('partials.header')
<body>
  <div class="container">
    <div class="row nav-top">
      @include('partials.nav_top')
    </div>
<div class="row">
	  @if (Sentry::check())
	      @include('partials.nav_left') 
	  @endif   
	      @include('partials.main_content')
</div><!-- #endof row -->
      @include('partials.footer')
  </div>
 </body>
</html>
