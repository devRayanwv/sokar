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
    <link href="{{public_path('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ public_path('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ public_path('css/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ public_path('css/custom.min.css') }}" rel="stylesheet">

</head>

<body>
<div class="container body">
    <div class="main_container">

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>General Information.</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div style="width:800px;height:200;">
                                    <h4>Name: {{ Auth::user()->name }}</h4>
                                    <h4>Number of Test: {{ $stat['total'] }}</h4>
                                    <h4>Average: {{ $stat['avg'] }}</h4>
                                    <br>
                                    <h4>Highest Test: {{ $stat['max'] }} on {{ $stat['maxDate']['created_at']->formatLocalized('%A %d %B %Y')}}</h4>
                                    <h4>Number of High Test: {{ $stat['maxCount'] }}</h4>
                                    <br>
                                    <h4>Lowest Test: {{ $stat['min'] }} on {{ $stat['minDate']['created_at']->formatLocalized('%A %d %B %Y')}}</h4>
                                    <h4>Number of Low Test: {{ $stat['minCount'] }}</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Blood Test Record.</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <!-- start user projects -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>High/Normal</th>
                                        <th>Time</th>
                                        <th>With</th>
                                        <th>Note</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td><span class="label label-danger">{{ $d->value }}</span></td>
                                            <td class="hidden-phone">
                                                @if($d->value > Auth::user()->maxTarget or $d->value < Auth::user()->minTarget)
                                                    <span class="label label-danger">High</span>
                                                @else
                                                    <span class="label label-success">Normal</span>
                                                @endif
                                            </td>

                                            <td>{{ $d->time->timeString }}</td>
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

        <!-- /page content -->


    </div>
</div>
<!-- jQuery -->
<script src="{{public_path('js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ public_path('js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ public_path('js/fastclick.js') }}"></script>
<script src="{{ public_path('js/moment.min.js') }}"></script>
<script src="{{ public_path('js/daterangepicker.js') }}"></script>

<!-- NProgress -->
<script src="{{ public_path('js/nprogress.js') }}"></script>
<script src="{{ public_path('js/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ public_path('js/jquery.inputmask.bundle.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ public_path('js/custom.js') }}"></script>
<script src="{{ public_path('js/index.js') }}"></script>

<script src="{{ public_path('js/echarts.min.js') }}"></script>

<footer>
    <div class="pull-right">
        Demo version of BSM Application
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</body>
</html>
