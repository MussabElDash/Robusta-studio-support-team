<!DOCTYPE html>
<html>

  <head>
    <title>@yield('title', 'Robusta')</title>

    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/AdminLTE.min.css') !!}
    {!! Html::style('assets/css/_all-skins.min.css') !!}

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
        <a class="logo">
          <span class="logo-lg"><b>Robusta</b></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="assets/images/user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Login</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <div class="form-login">
                      <h4>Welcome</h4>
                      <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" />
                      </br>
                      <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="password" />
                      </br>
                      <div class="wrapper" style="background:transparent;">
                        <span class="group-btn"><a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a></span>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <img src="assets/images/background.png" style="max-width: 1280px">
    </div>

    <footer class="main-footer" style="margin-left: 0px !important">
      @include('layout.footer')
    </footer>

  </body>

</html>
