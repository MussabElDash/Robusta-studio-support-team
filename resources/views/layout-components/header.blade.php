<a href="/home" class="logo">
  <span class="logo-mini"><b>R</b>bs</span>
  <span class="logo-lg"><b>Robusta</b></span>
</a>

<nav class="navbar navbar-static-top" role="navigation">
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li id="notifications-menu" class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <!-- number should be changed to $variable -->
          <span id="notifications-counter" class="label label-warning"></span>
        </a>
        <ul class="dropdown-menu" style="width:350px;">
          <!-- number should be changed to $variable -->
          <li class="header">{{ true ? 'No new notifications' : 'You have' . 5 . 'new notifications'}}</li>

          <li>
            <ul class="menu">
                @foreach ($notifications as $notification)
                    <li>
                        <a href="{{$notification->getURL()}}" style="{{$notification['seen'] === 0 ? 'font-weight: bold;' : ''}}">
                          <i class="{{'fa ' . $notification['css_class']}}"></i>{{$notification->text()}}
                        </a>
                    </li>
                @endforeach
              {{--@include('notifications.notification_1')--}}
              {{--@include('notifications.notification_2')--}}
              {{--@include('notifications.notification_3')--}}
              {{--@include('notifications.notification_4')--}}
              {{--@include('notifications.notification_5')--}}
            </ul>
          </li>
          <li class="footer"><a href="#">View all</a></li>
        </ul>
      </li>
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="/assets/images/user2-160x160.jpg" class="user-image" alt="User Image">
          <!-- should be current user name after authentication task -->
          <span class="hidden-xs"> {{ $user->name }}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
            <img src="/assets/images/user2-160x160.jpg" class="img-circle" alt="User Image">
            <p>
              {{ $user->name }} - {{ $user->role }}
              {{--*/ $creation = $user->created_at /*--}}
              <small>Member since {{ jdmonthname($creation->month,0) }}. {{ $creation->year }}</small>
            </p>
          </li>
          <li class="user-footer">
            <!-- <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div> -->
            <div class="pull-right">
              <a href="{{ url('/logout') }}" class="btn btn-danger btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
