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
                                        <img class="img-responsive avatar-view" src="images/user.png" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                                <h3>{{ Auth::user()->name }}</h3>

                                <a class="btn btn-danger"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
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
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="true">Profile</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Blood Sugar Level</a>
                                        </li>


                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                <div class="form-group">
                                                    <div class="control-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of Test: </span>
                                                        </label>
                                                        <div class="controls">
                                                            <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                                                <input type="text" class="form-control has-feedback-left" id="col4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blood sugar level: </span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Note:
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <textarea class="form-control" rows="3" placeholder="write a note (optional)"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit" class="btn btn-danger">Save</button>
                                                    </div>
                                                </div>

                                                <div class="ln_solid"></div>
                                            </form>

                                            <!-- start user projects -->
                                            <table class="data table table-striped no-margin">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Note</th>
                                                    <th>Date/Time</th>
                                                    <th>Level</th>
                                                    <th>Level in Range</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Note1</td>
                                                    <td>7 Mar 2017 1:00PM</td>
                                                    <td class="hidden-phone">18</td>
                                                    <td class="vertical-align-mid">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Note2</td>
                                                    <td>4 Mar 2017 2:00PM</td>
                                                    <td class="hidden-phone">13</td>
                                                    <td class="vertical-align-mid">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td></td>
                                                    <td>2 Mar 2017 9:00AM</td>
                                                    <td class="hidden-phone">30</td>
                                                    <td class="vertical-align-mid">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td></td>
                                                    <td>1 Mar 2017 3:00PM</td>
                                                    <td class="hidden-phone">28</td>
                                                    <td class="vertical-align-mid">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!-- end user projects -->

                                        </div>
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="{{ action('HomeController@editProfile') }}">
                                                {{ csrf_field() }}

                                                @if($status = Session::get('status'))
                                                    <div class="alert alert-info">
                                                        {{ $status }}
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Unit: </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="unit" class="form-control">
                                                            <option value="mmol/l">mmol/l</option>
                                                            <option value="mg/dl">mg/dl</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="minTaarget">Minimum Target: </span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="minTarget" name="minTarget" required="required" placeholder="{{ Auth::user()->minTarget }}" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="maxTarget">Maximum Target:
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="text" id="maxTarget" name="maxTarget" required="required" placeholder="{{ Auth::user()->maxTarget }}" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Language: </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <select name="language" class="form-control">
                                                            <option value="English">English</option>
                                                            <option value="Arabic">Arabic</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
