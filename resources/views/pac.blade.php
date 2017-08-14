@extends('layouts.app')

@section('content')

<div ng-app="pac" class="panel panel-default" ng-controller="ChartController">
    <div class="panel-body">
        <h2>PAC #1</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div id="gauge-chart" style="height:400px;"> </div>
                    </div>
                    <div class="col-md-6">
                        <div id="gauge-chart1" style="height:400px;"> </div>
                    </div>
                </div>
                <div id="line-chart" style="height:300px;"> </div>
                <div id="line-chart1" style="height:300px;"> </div>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-hover" id="bootgrid">
                    <thead>
                        <tr>
                            <!-- <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th> -->
                            <th data-column-id="created_at">Waktu</th>
                            <th data-column-id="sensor_id" data-formatter="sensor_id">PAC</th>
                            <th data-column-id="value" data-formatter="value">Value</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    var app = angular.module('pac', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

    app.controller('ChartController', function($scope, $http, $interval) {
        var chart = echarts.init(document.getElementById('gauge-chart'));
        var chart1 = echarts.init(document.getElementById('gauge-chart1'));
        var chart2 = echarts.init(document.getElementById('line-chart'));
        var chart3 = echarts.init(document.getElementById('line-chart1'));

        chart2.setOption({
            tooltip: {trigger: 'axis'},
            legend: {
                x: 200,
                y: 30,
                data: ['Temperature']
            },
            calculable: true,
            xAxis: [{
                type: 'category',
                boundaryGap: true,
                data: {{json_encode(range(1,30), JSON_NUMERIC_CHECK)}}
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                name: 'Temperature',
                type: 'line',
                data: [0]
            }]
        });

        chart3.setOption({
            tooltip: {trigger: 'axis'},
            legend: {
                x: 200,
                y: 30,
                data: ['Humidity']
            },
            calculable: true,
            xAxis: [{
                type: 'category',
                boundaryGap: true,
                data: {{json_encode(range(1,30), JSON_NUMERIC_CHECK)}}
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                name: 'Humidity',
                type: 'line',
                data: [0]
            }]
        });

        var series = [{
            // name: 'Performance',
            type: 'gauge',
            min: 0,
            max: 40,
            axisLine: {
                show: true,
                lineStyle: {
                    color: [[0.25, 'red'],[0.37,'orange'],[0.62, 'green'],[0.77, 'orange'],[1, 'red']],
                }
            },
            pointer: {
                length: '80%',
                width: 7,
                color: 'auto'
            },
            title: {
                show: true,
                offsetCenter: ['0%', 90],
                textStyle: {
                    color: '#999',
                    fontSize: 15
                }
            },
            detail: {
                show: true,
                formatter: '{value}c',
                textStyle: {
                    color: 'auto',
                    fontSize: 35
                }
            },
            data: [{value: 0, name: ''}]
        }];

        var series1 = [{
            // name: 'Performance',
            type: 'gauge',
            min: 0,
            max: 100,
            axisLine: {
                show: true,
                lineStyle: {
                    color: [[0.25, 'red'],[0.37,'orange'],[0.62, 'green'],[0.77, 'orange'],[1, 'red']],
                }
            },
            pointer: {
                length: '80%',
                width: 7,
                color: 'auto'
            },
            title: {
                show: true,
                offsetCenter: ['0%', 90],
                textStyle: {
                    color: '#999',
                    fontSize: 15
                }
            },
            detail: {
                show: true,
                formatter: '{value}%',
                textStyle: {
                    color: 'auto',
                    fontSize: 35
                }
            },
            data: [{value: 0, name: ''}]
        }];

        chart.setOption({ series: series });
        chart1.setOption({ series: series1 });

        var grid = $('#bootgrid').bootgrid({
            ajax: true, url: '/sensorLog',
            ajaxSettings: {method: 'GET', cache: false},
            searchSettings: { delay: 100, characters: 3 },
            formatters: {
                "sensor_id": function(column, row) {
                    return row.sensor_id == 1 ? 'Temperature' : 'Humidity';
                },
                "value": function(column, row) {
                    return row.value;
                    // return (row.value < 18 || row.value > 22)
                    //     ? '<span class="text-danger"><strong>'+row.value+'</strong></span>'
                    //     : '<span class="text-success"><strong>'+row.value+'</strong></span>';
                }
            }
        });

        $interval(function() {
            $http.get('/pac-snmp').then(function(j) {
                console.log(j.data);

                chart.setOption({
                    series: [{
                        data: [{value: j.data.value_1, name: 'Temperature'}]
                    }]
                });

                chart1.setOption({
                    series: [{
                        data: [{value: j.data.value_2, name: 'Humidity'}]
                    }]
                });

                chart2.setOption({
                    series: [{
                        name: 'Temperature',
                        type: 'line',
                        data: j.data.data_1
                    }]
                });

                chart3.setOption({
                    series: [{
                        name: 'Temperature',
                        type: 'line',
                        data: j.data.data_2
                    }]
                });

                $('#bootgrid').bootgrid('reload');

            });
        }, 2000);

    });

</script>


@endpush
