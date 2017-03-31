@extends('layouts.plain')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>User Profile</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive avatar-view" src={{asset('images/user.png')}} alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                                <h3>{{ Auth::user()->name }}</h3>

                                <br />

                                <!-- user info -->
                                <ul class="list-unstyled user_data">
                                    <li><span>Unit:</span> {{ Auth::user()->unit }}
                                    </li>
                                    <li><span>Target:</span> {{ Auth::user()->minTarget }} To {{ Auth::user()->maxTarget }}
                                    </li>
                                    <li><span>Language:</span> {{ Auth::user()->language }}
                                    </li>
                                </ul>
                                <!-- user info -->

                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
