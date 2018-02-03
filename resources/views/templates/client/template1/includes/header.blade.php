      <header class="main-header top-m-header">
        <!-- Logo -->
        <a href="/" target="_brank" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="{{asset('img/finfo.png')}}" alt="" style="width: 45px;"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="{{asset('img/finfo.png')}}" alt=""></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle top-nav" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu noti-top">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu small-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-question noti-icon"></i>
                  <span class="label label-success"></span> <!--for add number of notification!-->
                </a>
                <ul class="dropdown-menu">
                  <li class="header">No messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <!--
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/img/user3-128x128.jpg" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li> !-->
                      
                    </ul>
                  </li>
                  <!--<li class="footer"><a href="#">See All Messages</a></li>!-->
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu small-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"></span>
                </a>
                <ul class="dropdown-menu" style="width: 80%;">
                  <li class="header">no notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                    <!--
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      !-->
                    </ul>
                  </li>
                  <!--<li class="footer"><a href="#">View all</a></li>!-->
                </ul>
              </li>
              <li class="dropdown user user-menu small-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user noti-icon"></i>
                  <i class="fa fa-caret-down noti-icon"></i>
                </a>
                <ul class="dropdown-menu" id="user-profile">

                  <!-- User image -->
                  <li class="user-header">           
                      @if(Auth::check())
                            @if(Auth::user()->profile_picture == '')
                              <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            @else
                              <img src="/{{Auth::user()->profile_picture}}" class="img-circle" alt="User Image">
                            @endif

                            <p>
                              <small>{{Auth::user()->last_name.' '.Auth::user()->first_name}}</small>
                            </p>
                          @endif                   
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{route('client.admin.profile')}}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{route('client.logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>

      </header>
