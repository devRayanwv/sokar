@extends('layouts.adminPlain')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="tile_count">
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                <div class="count">{{ $stat['userCount'] }}</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-tachometer"></i> Total Sugar Test</span>
                <div class="count green">{{ $stat['testCount'] }}</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-file-pdf-o"></i> Total PDF files</span>
                <div class="count">{{ $stat['pdfCount'] }}</div>
            </div>
        </div>
        <!-- /top tiles -->
        <div class="row">
            <div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Users</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <!-- start user projects -->
                                <table class="data table table-striped no-margin">
                                    <thead>
                                    <tr>
                                        <th>UserID</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach($user->roles as $v)
                                                @if($v->display_name == 'Admin')
                                                        <label class="label label-warning">{{ $v->display_name }}</label>
                                                @else
                                                    <label class="label label-success">{{ $v->display_name }}</label>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            {!! $data->render() !!}
                                <!-- end user projects -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
