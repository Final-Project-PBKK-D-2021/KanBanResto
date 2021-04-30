<div class="aside-header">
  <a class="navbar-brand" href="{{ url('') }}" class="aside-logo">
    <img src="{{ url('assets/img/logo.png') }}" height="30" alt="" class="aside-logo">
  </a>
  <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
  </a>
  </div>
  <div class="aside-body">
  <ul class="nav nav-aside">
      <li class="nav-item {{ (Request::is('/') or Request::is('beranda')) ? 'active' : '' }}"><a href="{{ url('') }}" class="nav-link"><i data-feather="home"></i> <span>Beranda</span></a></li>
      @foreach (scandir($path = app_path('Modules')) as $dir)
          @if (file_exists($filepath = "{$path}/{$dir}/Presentation/views/menu.blade.php"))
              @include($dir.'::menu')
          @endif
      @endforeach
  </ul>
</div>
