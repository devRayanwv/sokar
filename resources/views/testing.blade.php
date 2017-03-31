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

    <style>
        body {
            background: blue;
        }
    </style>
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
                                    <!-- Content -->
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


<script>

    if ($('#mainb').length ){
        var levels = {!! json_encode($level) !!}; // Get values from controller
        var theme = {
            color: [
                '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
                '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
            ],

            title: {
                itemGap: 8,
                textStyle: {
                    fontWeight: 'normal',
                    color: '#408829'
                }
            },

            dataRange: {
                color: ['#1f610a', '#97b58d']
            },

            toolbox: {
                color: ['#408829', '#408829', '#408829', '#408829']
            },

            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.5)',
                axisPointer: {
                    type: 'line',
                    lineStyle: {
                        color: '#408829',
                        type: 'dashed'
                    },
                    crossStyle: {
                        color: '#408829'
                    },
                    shadowStyle: {
                        color: 'rgba(200,200,200,0.3)'
                    }
                }
            },

            dataZoom: {
                dataBackgroundColor: '#eee',
                fillerColor: 'rgba(64,136,41,0.2)',
                handleColor: '#408829'
            },
            grid: {
                borderWidth: 0
            },

            categoryAxis: {
                axisLine: {
                    lineStyle: {
                        color: '#408829'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            },

            valueAxis: {
                axisLine: {
                    lineStyle: {
                        color: '#408829'
                    }
                },
                splitArea: {
                    show: true,
                    areaStyle: {
                        color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            },
            timeline: {
                lineStyle: {
                    color: '#408829'
                },
                controlStyle: {
                    normal: {color: '#408829'},
                    emphasis: {color: '#408829'}
                }
            },

            k: {
                itemStyle: {
                    normal: {
                        color: '#68a54a',
                        color0: '#a9cba2',
                        lineStyle: {
                            width: 1,
                            color: '#408829',
                            color0: '#86b379'
                        }
                    }
                }
            },
            map: {
                itemStyle: {
                    normal: {
                        areaStyle: {
                            color: '#ddd'
                        },
                        label: {
                            textStyle: {
                                color: '#c12e34'
                            }
                        }
                    },
                    emphasis: {
                        areaStyle: {
                            color: '#99d2dd'
                        },
                        label: {
                            textStyle: {
                                color: '#c12e34'
                            }
                        }
                    }
                }
            },
            force: {
                itemStyle: {
                    normal: {
                        linkStyle: {
                            strokeColor: '#408829'
                        }
                    }
                }
            },
            chord: {
                padding: 4,
                itemStyle: {
                    normal: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            }
                        }
                    },
                    emphasis: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            }
                        }
                    }
                }
            },
            gauge: {
                startAngle: 225,
                endAngle: -45,
                axisLine: {
                    show: true,
                    lineStyle: {
                        color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                        width: 8
                    }
                },
                axisTick: {
                    splitNumber: 10,
                    length: 12,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                axisLabel: {
                    textStyle: {
                        color: 'auto'
                    }
                },
                splitLine: {
                    length: 18,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                pointer: {
                    length: '90%',
                    color: 'auto'
                },
                title: {
                    textStyle: {
                        color: '#333'
                    }
                },
                detail: {
                    textStyle: {
                        color: 'auto'
                    }
                }
            },
            textStyle: {
                fontFamily: 'Arial, Verdana, sans-serif'
            }
        };

        var echartBar = echarts.init(document.getElementById('mainb'), theme);

        echartBar.setOption({
            title: {
                text: 'Sugar Level',
                subtext: ''
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['Exercise', 'Medicine', 'No Exercise&Medicine']
            },
            toolbox: {
                show: false
            },
            calculable: false,
            xAxis: [{
                type: 'category',
                data: ['Fasting', 'Before Lunch', 'After Lunch', 'Before Dinner', 'After Dinner']
            }],
            yAxis: [{
                type: 'value',
            }],

            series: [{
                name: 'Exercise',
                type: 'bar',
                data: [levels['e']['fasting'], levels['e']['beforeLunch'],levels['e']['afterLunch'],levels['e']['beforeDinner'],levels['e']['afterDinner']],
                markPoint: {
                    data: [{
                        type: 'max',
                        name: '???'
                    }, {
                        type: 'min',
                        name: '???'
                    }]
                },
                markLine: {
                    data: [{
                        yAxis: 4, // Max & Min sugar level


                    }]
                }
            }, {
                name: 'Medicine',
                type: 'bar',
                data: [levels['m']['fasting'], levels['m']['beforeLunch'],levels['m']['afterLunch'],levels['m']['beforeDinner'],levels['m']['afterDinner']],
                markPoint: {
                    data: [{
                        type: 'max',
                        name: '???'
                    }, {
                        type: 'min',
                        name: '???'
                    }]
                },
                markLine: {
                    data: [{
                        yAxis: 7, // Max & Min sugar level
                    }]
                }
            },
                {
                    name: 'No Exercise&Medicine',
                    type: 'bar',
                    data: [levels['no']['fasting'], levels['no']['beforeLunch'],levels['no']['afterLunch'],levels['no']['beforeDinner'],levels['no']['afterDinner']],
                    markPoint: {
                        data: [{
                            type: 'max',
                            name: '???'
                        }, {
                            type: 'min',
                            name: '???'
                        }]
                    },
                    markLine: {
                        data: [{
                            yAxis: 4, // Max & Min sugar level
                        }]
                    }
                }
            ]
        });

    }



</script>
</body>
</html>