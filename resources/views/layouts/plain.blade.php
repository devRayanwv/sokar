<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>
      <!-- Bootstrap -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
      <!-- NProgress -->
      <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet">

      <!-- Custom Theme Style -->
      <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-tint"></i> <span>BSM Application</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/user.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Main Options</h3>
                <ul class="nav side-menu">
                    <li><a href="/dashboard"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="/dashboard/mbs"><i class="fa fa-tint"></i>Manage Blood Sugar</a></li>
                    <li><a href="/dashboard/medicine"><i class="fa fa-stethoscope"></i>Medicine</a></li>
                    <li><a href="/dashboard/exercise"><i class="fa fa-thumbs-o-up"></i>Exercise</a></li>
                    <li><a href="/dashboard/pdf"><i class="fa fa-file-pdf-o"></i>PDF files</a></li>
                    <li><a href="/dashboard/links"><i class="fa fa-link"></i>Links</a></li>
                    <li><a href="/dashboard/profile"><i class="fa fa-folder-open"></i>Profile</a></li>
                    <li><a href="/dashboard/settings"><i class="fa fa-cogs"></i>Settings</a></li>


                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->


          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/user.png') }}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    </form>
                  </ul>
                </li>
</ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

      @yield('content')

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Demo version of BSM Application
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>

    <!-- NProgress -->
    <script src="{{ asset('js/nprogress.js') }}"></script>
    <script src="{{ asset('js/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
  </body>
</html>
