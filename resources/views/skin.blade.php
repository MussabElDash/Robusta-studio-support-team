.skin-blue .main-header .navbar {
background-color: {{Setting::get('color_1')}};
}
.skin-blue .main-header .navbar .nav > li > a {
color: {{Setting::get('color_2')}};
}
.skin-blue .main-header .navbar .nav > li > a:hover,
.skin-blue .main-header .navbar .nav > li > a:active,
.skin-blue .main-header .navbar .nav > li > a:focus,
.skin-blue .main-header .navbar .nav .open > a,
.skin-blue .main-header .navbar .nav .open > a:hover,
.skin-blue .main-header .navbar .nav .open > a:focus,
.skin-blue .main-header .navbar .nav > .active > a {
background: rgba(0, 0, 0, 0.1);
color: {{Setting::get('color_3')}};
}
.skin-blue .main-header .navbar .sidebar-toggle {
color: {{Setting::get('color_2')}}fff;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover {
color: {{Setting::get('color_3')}};
background: rgba(0, 0, 0, 0.1);
}
.skin-blue .main-header .navbar .sidebar-toggle {
color: {{Setting::get('color_2')}};
}
.skin-blue .main-header .navbar .sidebar-toggle:hover {
background-color: {{Setting::get('color_4')}};
}
@media (max-width: 767px) {
.skin-blue .main-header .navbar .dropdown-menu li.divider {
background-color: rgba(255, 255, 255, 0.1);
}
.skin-blue .main-header .navbar .dropdown-menu li a {
color: {{Setting::get('color_2')}};
}
.skin-blue .main-header .navbar .dropdown-menu li a:hover {
background: {{Setting::get('color_4')}};
}
}
.skin-blue .main-header .logo {
background-color: {{Setting::get('color_4')}};
color: {{Setting::get('color_2')}};
border-bottom: 0 solid transparent;
}
.skin-blue .main-header .logo:hover {
background-color: {{Setting::get('color_5')}};
}
.skin-blue .main-header li.user-header {
background-color: {{Setting::get('color_1')}};
}
.skin-blue .content-header {
background: transparent;
}
.skin-blue .wrapper,
.skin-blue .main-sidebar,
.skin-blue .left-side {
background-color: {{Setting::get('color_6')}};
}
.skin-blue .user-panel > .info,
.skin-blue .user-panel > .info > a {
color: {{Setting::get('color_2')}};
}
.skin-blue .sidebar-menu > li.header {
color: {{Setting::get('color_7')}};
background: {{Setting::get('color_8')}};
}
.skin-blue .sidebar-menu > li > a {
border-left: 3px solid transparent;
}
.skin-blue .sidebar-menu > li:hover > a,
.skin-blue .sidebar-menu > li.active > a {
color: {{Setting::get('color_2')}}fff;
background: {{Setting::get('color_9')}};
border-left-color: {{Setting::get('color_1')}};
}
.skin-blue .sidebar-menu > li > .treeview-menu {
margin: 0 1px;
background: {{Setting::get('color_10')}};
}
.skin-blue .sidebar a {
color: {{Setting::get('color_11')}};
}
.skin-blue .sidebar a:hover {
text-decoration: none;
}
.skin-blue .treeview-menu > li > a {
color: {{Setting::get('color_12')}};
}
.skin-blue .treeview-menu > li.active > a,
.skin-blue .treeview-menu > li > a:hover {
color: {{Setting::get('color_2')}}fff;
}
.skin-blue .sidebar-form {
border-radius: 3px;
border: 1px solid {{Setting::get('color_13')}};
margin: 10px 10px;
}
.skin-blue .sidebar-form input[type="text"],
.skin-blue .sidebar-form .btn {
box-shadow: none;
background-color: {{Setting::get('color_13')}};
border: 1px solid transparent;
height: 35px;
-webkit-transition: all 0.3s ease-in-out;
-o-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
}
.skin-blue .sidebar-form input[type="text"] {
color: {{Setting::get('color_14')}};
border-top-left-radius: 2px;
border-top-right-radius: 0;
border-bottom-right-radius: 0;
border-bottom-left-radius: 2px;
}
.skin-blue .sidebar-form input[type="text"]:focus,
.skin-blue .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
background-color: {{Setting::get('color_2')}};
color: {{Setting::get('color_14')}};
}
.skin-blue .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
border-left-color: {{Setting::get('color_2')}};
}
.skin-blue .sidebar-form .btn {
color: {{Setting::get('color_15')}};
border-top-left-radius: 0;
border-top-right-radius: 2px;
border-bottom-right-radius: 2px;
border-bottom-left-radius: 0;
}
.skin-blue.layout-top-nav .main-header > .logo {
background-color: {{Setting::get('color_1')}};
color: {{Setting::get('color_2')}}fff;
border-bottom: 0 solid transparent;
}
.skin-blue.layout-top-nav .main-header > .logo:hover {
background-color: {{Setting::get('color_16')}};
}
