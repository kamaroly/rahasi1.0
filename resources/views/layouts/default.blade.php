<html lang="en">
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