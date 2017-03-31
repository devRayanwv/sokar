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
                            <h2>User Settings</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="{{ action('HomeController@editSettings') }}">
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
                                                @if(Auth::user()->unit == "mmol/l")
                                                    <option value="mmol/l" selected>mmol/l</option>
                                                    <option value="mg/dl">mg/dl</option>
                                                @else
                                                    <option value="mmol/l" >mmol/l</option>
                                                    <option value="mg/dl" selected>mg/dl</option>
                                                @endif

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
                                                @if(app()->getLocale() == "en")
                                                <option value="en" selected>English</option>
                                                <option value="ar">Arabic</option>
                                                @else
                                                    <option value="en" >English</option>
                                                    <option value="ar" selected>Arabic</option>
                                                @endif
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
    <!-- /page content -->

@endsection
