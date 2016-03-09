<li class="nav-docs"><a href="/docs">Documentation</a></li>

<!--
<li class="dropdown community-dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services <span class="caret"></span></a>
	<ul class="dropdown-menu" role="menu">
		<li class="nav-forge"><a href="https://merchants.rahasi.com">Merchants payment</a></li>
		<li class="nav-envoyer"><a href="https://salesrequest.rahasi.com">Sales request</a></li>
	</ul>
</li>

<li class="dropdown community-dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Community <span class="caret"></span></a>
	<ul class="dropdown-menu" role="menu">
		<li><a href="#si">GitHub</a></li>
		<li class="divider"></li>
		<li><a href="#">Rahasi Blog</a></li>
		<li class="divider"></li>
		<li><a href="#">Jobs</a></li>
		<li><a href="#">Forums</a></li>
		<li><a href="#">Newsletter</a></li>
		<li><a href="#">Twitter</a></li>
	</ul>
</li>
-->
 @if (Sentry::check())
       
        
         <li class="dropdown-toggle">
          <a href="{{ route('dashboard') }}">dashboard</a>
        </li>
        <li {!! (Request::is('profile') ? 'class="dropdown-toggle active"' : '') !!} >
              <a href="{{ route('sentinel.profile.show') }}" >
              <span class="fa fa-cog"></span>
              {{ Sentry::getUser()->email }}
            </a>
        </li>
         <li class="dropdown-toggle">
          <a href="{{ route('sentinel.logout') }}">Logout</a>
        </li>
        
        @else
        <li {!! (Request::is('login') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.login') }}">Login</a></li>
        <li {!! (Request::is('users/create') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.register.form') }}">Register</a></li>
        @endif
