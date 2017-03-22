@extends('layouts.plain')

@section('content')


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Main Page</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Graph Bar for Latest Seven Test.</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="mainb" style="width: 100%; min-height: 400px"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Latest 10 Test Record.</h2>
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
                                    <th>#</th>
                                    <th>Level</th>
                                    <th>With</th>
                                    <th>Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d->id }}</td>
                                        <td class="hidden-phone">{{ $d->value }}</td>
                                        <td class="hidden-phone">
                                        @if (!$d->exercise_id)
                                        @if (!$d->medicine_id)
                                            No Medicine&Exercise
                                            @endif
                                            @endif

                                            @if ($d->exercise_id)
                                                @if (!$d->medicine_id)
                                                    Exercise
                                                @endif
                                            @endif
                                            @if (!$d->exercise_id)
                                                @if ($d->medicine_id)
                                                    Medicine
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $d->note }}</td>

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
    <script src="js/jquery.min.js"></script>
    <!-- /page content -->
    <script src="js/echarts.min.js"></script>


@endsection
