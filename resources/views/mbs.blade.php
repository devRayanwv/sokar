@extends('layouts.plain')

@section('content')


    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-bars"></i></div>
                        <div class="count" id="total">0</div>
                        <h3>Number of Tests</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-lightbulb-o"></i></div>
                        <div class="count"
                             @if($stat['avg'] > Auth::user()->maxTarget or $stat['avg'] < Auth::user()->minTarget)
                             style="color:#bf5329"
                             @else
                             style="color:#2ab27b"
                             @endif
                             id="avg">0</div>
                        <h3>Average</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-level-up"></i></div>
                        <div class="count"
                             @if($stat['max'] > Auth::user()->maxTarget or $stat['max'] < Auth::user()->minTarget)
                             style="color:#bf5329"
                             @else
                             style="color:#2ab27b"
                             @endif
                             id="high">0</div>
                        <h3>Highest Number</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-level-down"></i></div>
                        <div class="count"
                             @if($stat['min'] > Auth::user()->maxTarget or $stat['min'] < Auth::user()->minTarget)
                             style="color:#bf5329"
                             @else
                             style="color:#2ab27b"
                             @endif
                             id="low">0</div>
                        <h3>Lowest Number</h3>
                    </div>
                </div>
            </div>

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
                                        <select name="timeString_id" class="form-control">
                                            <option value="1">Fasting</option>
                                            <option value="2">Before Lunch</option>
                                            <option value="3">After Lunch</option>
                                            <option value="4">Before Dinner</option>
                                            <option value="5">After Dinner</option>

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


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Tests.</h2>
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
                                    <th>Level</th>
                                    <th>Time</th>
                                    <th>With</th>
                                    <th>Added</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $d)
                                    <tr>

                                        <td class="hidden-phone">
                                            @if($d->value > Auth::user()->maxTarget or $d->value < Auth::user()->minTarget)
                                                <span class="label label-danger">{{ $d->value }}</span>
                                            @else
                                                <span class="label label-success">{{ $d->value }}</span>
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

                                            @if ($d->exercise_id)
                                                @if ($d->medicine_id)
                                                    Exercise & Medicine
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $d->created_at->diffForHumans() }}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <!-- end user projects -->
                        </div>
                        {!! $data->render() !!}
                    </div>
                </div>
            </div> <!-- End row -->


        </div>
    </div>
    <!-- jQuery -->
    <script src={{asset("js/jquery.min.js")}}></script>
    <script src={{asset("js/jquery.animateNumber.min.js")}}></script>
    <script>
    var stat = {!! json_encode($stat) !!}; // Get values from controller
    console.log(stat);
    var decimal_places = 2;
    var decimal_factor = decimal_places === 0 ? 1 : Math.pow(10, decimal_places);
    $('#total').animateNumber({ number: stat.total }, 1500);

    $('#avg').animateNumber({ number: stat.avg * decimal_factor,
        numberStep: function(now, tween) {
            var floored_number = Math.floor(now) / decimal_factor,
                target = $(tween.elem);

            if (decimal_places > 0) {
                // force decimal places even if they are 0
                floored_number = floored_number.toFixed(decimal_places);

                // replace '.' separator with ','
                floored_number = floored_number.toString().replace('.', '.');
            }

            target.text(floored_number);
        }}, 1500);

    $('#high').animateNumber({ number: stat.max  * decimal_factor,
        numberStep: function(now, tween) {
        var floored_number = Math.floor(now) / decimal_factor,
            target = $(tween.elem);

        if (decimal_places > 0) {
            // force decimal places even if they are 0
            floored_number = floored_number.toFixed(decimal_places);

            // replace '.' separator with ','
            floored_number = floored_number.toString().replace('.', '.');
        }

        target.text(floored_number);
    } }, 1500);

    $('#low').animateNumber({ number: stat.min  * decimal_factor,
        numberStep: function(now, tween) {
        var floored_number = Math.floor(now) / decimal_factor,
            target = $(tween.elem);

        if (decimal_places > 0) {
            // force decimal places even if they are 0
            floored_number = floored_number.toFixed(decimal_places);

            // replace '.' separator with ','
            floored_number = floored_number.toString().replace('.', '.');
        }

        target.text(floored_number);
    } },1500);


</script>
    <!-- /page content -->
    <script src={{asset("js/echarts.min.js")}}></script>


@endsection
