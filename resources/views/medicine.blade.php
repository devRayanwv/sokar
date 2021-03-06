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
                            <h2>{{ trans('text.medTitle') }}</h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action="{{ action('HomeController@addMedicine') }}">
                                    {{ csrf_field() }}

                                    @if($status = Session::get('status'))
                                        <div class="alert alert-info">
                                            {{ $status }}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                            {{ trans('text.medF1') }}
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="medname" name="name" required="required" placeholder="Enter the medicine name." class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dose">
                                            {{ trans('text.medF2') }}
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="dose" name="dose" required="required" placeholder="" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note">{{ trans('text.medF5') }}
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="note" name="note" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">{{ trans('text.medF4') }}</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Medicine. </h2>


                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                                <thead>
                                <tr>
                                    <th>Medicine Name</th>
                                    <th>Dose</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->dose }}</td>
                                        <td>{{ $d->note }}</td>

                                        <td>
                                            <a href="/dashboard/medicine/delete/{{ $d->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <!-- end user projects -->
                        </div>
                    </div>
                </div>
            </div> <!-- End row -->

        </div>
    </div>
    <!-- /page content -->

@endsection
