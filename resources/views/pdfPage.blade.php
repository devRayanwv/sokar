@extends('layouts.plain')

@section('content')


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Generate PDF file.</h2>
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
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Period: </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="period" class="form-control">
                                            <option value="1">Yesterday</option>
                                            <option value="2">Last Week</option>
                                            <option value="3">Last 30 days</option>
                                            <option value="4">All Tests</option>
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
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-cogs"></i> Generate</button>

                                    </div>

                                </div>

                                <div class="ln_solid">
                                    <div id="progress4" style="display: flex; flex: 1">
                                        <img class="img-responsive" src="{{ asset('images/ajax-loader.gif') }}"/>
                                        <h4 style="color:darkred; flex: 2">  Generating pdf file may take a while.</h4>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                            </form>

                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>PDF files. </h2>


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
                                    <th>File Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td><a href="/dashboard/pdf/get/{{ $d->filename }}">{{ $d->filename }}</a></td>
                                        <td>{{ $d->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="/dashboard/pdf/delete/{{ $d->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                            <a href="#" class="btn btn-success"><i class="fa fa-link"></i> Share by Email</a>

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
    <!-- jQuery -->
    <script src={{asset("js/jquery.min.js")}}></script>
    <script type="text/javascript">


        $(document).ready(function() {
            console.log('doc ready');
            $('#progress4').hide(); //hide progress bar
            console.log('element hidden');
            $('form').submit(function(event) {
                var period = $(".period").val();
                var with1 = $(".with").val();

                $('#progress4').show(); //show progress bar

                $.ajax({
                    type: "POST",
                    dataType: 'application/json',
                    data: {
                        "persiod" : period,
                        "with" : with1,
                        "_token": $("#csrf-token").val(),
                    },
                    url: 'pdf',
                    success: function(data){
                        $('#progress4').hide(); //hide progress bar
                        $("#result").html(data);
                    }
                });

                e.preventDefault();
            });

        });

    </script>
@endsection
