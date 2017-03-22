@extends('layouts.plain')

@section('content')


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Bood Sugar Management Page.</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add new Test.</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            @if($status = Session::get('status'))
                                <div class="alert alert-info">
                                    {{ $status }}
                                </div>
                            @endif
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ action('HomeController@addMbs') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Time: </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="timeOfTest" class="form-control">
                                            <option value="1">Fasting</option>
                                            <option value="2">Before Meal</option>
                                            <option value="3">After Meal</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">With: </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="with" class="form-control">
                                            <option value="1">No Medicine&Exercice</option>
                                            <option value="2">Exercise</option>
                                            <option value="3">Medicine</option>
                                            <option value="4">Medicine&Exercise</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Blood sugar level: </span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="value" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Note:
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control" name="note" rows="3" placeholder="write a note (optional)"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- /page content -->
    <script src="js/echarts.min.js"></script>


@endsection
