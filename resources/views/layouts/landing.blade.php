<!DOCTYPE html>

<html>

  <head>
    <title>@yield('title', 'Robusta')</title>

    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/AdminLTE.min.css') !!}
    {!! Html::style('assets/css/_all-skins.min.css') !!}
    {!! Html::style('assets/css/our-css.css') !!}

    {!! Html::script('assets/js/jQuery-2.1.4.min.js') !!}
    {!! Html::script('assets/js/jquery-ui.min.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/AdminLTE.min.js') !!}

    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="/" class="logo">
          <span class="logo-lg">
              <b>
                  Robusta
              </b>
          </span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
              @else
                  <li class="dropdown user user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <img src="assets/images/user2-160x160.jpg" class="user-image" alt="User Image">
                          <span class="hidden-xs"> {{ Auth::user()->name }}</span>
                          <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                      </ul>
                  </li>
              @endif
            </ul>
          </div>
        </nav>
      </header>

      <div style="min-height: 500px">
          @yield('content')
      </div>
    </div>


    <footer class="main-footer" style="margin-left: 0px !important">
      @include('layout-components.footer')
    </footer>

  </body>
</html>
