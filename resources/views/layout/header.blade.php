<a href="index2.html" class="logo">
  <span class="logo-mini"><b>R</b>bs</span>
  <span class="logo-lg"><b>Robusta</b></span>
</a>

<nav class="navbar navbar-static-top" role="navigation">
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <!-- number should be changed to $variable -->
          <span class="label label-warning">0</span>
        </a>
        <ul class="dropdown-menu">
          @if (false)
            <li class="header">You have @yield('notificationsCount') notifications</li>
          @else
            <li class="header">No new notifications</li>
          @endif
          <!-- should be refactored to partials after we set the types of the notifications -->
          <li>
            <ul class="menu">
              <li>
                <a href="#">
                  <i class="fa fa-users text-aqua"></i> 5 new members joined today
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-users text-red"></i> 5 new members joined
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-user text-red"></i> You changed your username
                </a>
              </li>
            </ul>
          </li>
          <li class="footer"><a href="#">View all</a></li>
        </ul>
      </li>
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="assets/images/user2-160x160.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs">Alexander Pierce</span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
            <img src="assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">
            <p>
              Alexander Pierce - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <li class="user-footer">
            <!-- <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div> -->
            <div class="pull-right">
              <a href="#" class="btn btn-danger btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>