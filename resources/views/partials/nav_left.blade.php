<div class="col-sm-2 col-md-1 sidebar">
  <ul class="nav nav-sidebar">
    <li {!! (Request::is('dashboard*') ? 'class="active"' : '') !!} >
      <a href="{{ route('dashboard') }}">
        <div class="nav-icon"><span class="icon-stats"></span></span></div>
        <div class="nav-title">{{ trans('navigation.dashboard') }}</div>
      </a>
    </li>
    <li {!! (Request::is('groups*') ? 'class="active"' : '') !!}>
      <a href="{{ route('bills.index') }}">
        <div class="nav-icon"><span class="icon-book"></i></span></div>
        <div class="nav-title">{{ trans('navigation.bills') }}</div>
      </a>
    </li>

    <li >
      <a href="#" {!! (Request::is('client*') ? 'class="active"' : '') !!}>
        <div class="nav-icon"><span class="icon-user-2"></span></div>
        <div class="nav-title">{{ trans('navigation.clients') }}</div>
      </a>
    </li>
    @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
          <li {!! (Request::is('users*') ? 'class="active"' : '') !!}>
              <a href="{{ action('\\Sentinel\Controllers\UserController@index') }}">
                <div class="nav-icon"><span class="icon-user-2"></span></div>
                <div class="nav-title">{{ trans('navigation.users') }}</div>
              </a>
          </li>
          <li {!! (Request::is('groups*') ? 'class="active"' : '') !!}>
          <a href="{{ action('\\Sentinel\Controllers\GroupController@index') }}">
                <div class="nav-icon"><span class="fa fa-users"></span></div>
                <div class="nav-title">{{ trans('navigation.groups') }}</div>
          </a>
          </li>
        @endif
    <li >
      <a href="{{ route('settings.index') }}">
        <div class="nav-icon"><span class="icon-tools"></span></div>
        <div class="nav-title">{{ trans('navigation.settings') }}</div>
      </a>
    </li>
  </ul>
</div>