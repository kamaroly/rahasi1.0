<div class="col-sm-12 col-md-12 top-nav">
<a href="/" class="logo">
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>RAHA</b>SI</span>
        </a>
   <ul>
        @if (Sentry::check())
        <li class="dropdown-toggle">
          <a href="{{ route('sentinel.logout') }}">Logout</a>
        </li>
        <li class="dropdown-toggle">
          <a href="#" class="btn btn-warning">{{ Sentry::getUser()->environment }}</a>
        </li>
        <li {!! (Request::is('profile') ? 'class="dropdown-toggle active"' : '') !!} >
              <a href="{{ route('sentinel.profile.show') }}" >
              <span class="fa fa-cog"></span>
              {{ Sentry::getUser()->email }}
            </a>
        </li>
        
        @else
        <li {!! (Request::is('login') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.login') }}">Login</a></li>
        <li {!! (Request::is('users/create') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.register.form') }}">Register</a></li>
        @endif
    <li>
    </li>
  </ul>
</div>