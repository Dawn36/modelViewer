@extends('layouts.main')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row gy-5 g-xl-10">
                <div class="col-xl-12 mb-5 mb-xl-10">
                    <div class="card card-docs mb-2">
                        <div class="p-10 pb-2">
                            <h1 class="anchor fw-bolder" id="zero-configuration">
                                <a href="javascript:;"></a>Analytics
                            </h1>
                        </div>
                        <div class="card-body fs-6 py-lg-5 text-gray-700">
                            <form id="" class="form" method="get" action="{{ route('analytics_index') }}" >
                            <div class="row">
                                <div class="col col-lg-2">
                                    <label class="required fw-bold fs-6 mb-2">Model Name</label>
                                    <select name="model_id" class="form-control form-control-solid mb-3 mb-lg-0" required>
                                        <option value="">Select Model</option>
                                        @for ($i = 0; $i < count($model); $i++)
                                        <option value="{{$model[$i]->id}}" {{request()->model_id == $model[$i]->id ? 'Selected' : '' }}>{{ucwords($model[$i]->name)}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col col-lg-3">
                                    <label class="required fw-bold fs-6 mb-2">Select Date</label>
                                    <input type="text" name="date" value="{{request()->date}}" class="form-control form-control-solid mb-3 mb-lg-0 kt_datepicker_2"  />
                                </div>
                                <div class="col mt-8">
                                    <button type="submit" class="btn btn-light-primary">Search</button>
                                </div>
                            </div>
                            </form>

                            <div id="analytics_chart" style="height: 350px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function() {

       
        $(".kt_datepicker_2").flatpickr({
            enableTime: false,
    dateFormat: "Y",
});

        // Analytics Chart
        var element = document.getElementById('analytics_chart');

        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
        var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
        var baseColor = KTUtil.getCssVariableValue('--bs-primary');
        var lightColor = KTUtil.getCssVariableValue('--bs-light-primary');

        if (!element) {
            return;
        }

        var options = {
            series: [{
                name: 'Views',
                data: <?php echo $userCount?>
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {

            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'solid',
                opacity: 1
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor]
            },
            xaxis: {
                categories: <?php echo $month?>,
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function(val) {
                        return val 
                    }
                }
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    });
    </script>

@endsection('content')