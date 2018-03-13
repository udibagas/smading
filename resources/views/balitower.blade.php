@extends('layouts.app')

@section('content')

<div ng-app="pac" class="x_panel" ng-controller="ChartController">
    <div class="x_content">
        <h2>RAK 1</h2>
        <hr>
        <div class="row">
            <?php for ($i=0;$i<=3;$i++): ?>
                <div class="col-md-4">
                    <div class="row">
                        <?php for ($j=0;$j<=3;$j++) : ?>
                        <div class="col-md-4">
                            <div id="gauge-chart<?= $i ?>_<?= $j ?>" style="height:200px;"> </div>
                        </div>
                        <?php endfor ?>
                    </div>
                </div>
            <?php endfor ?>
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

                // chart2.setOption({
                //     series: [{
                //         name: 'Temperature',
                //         type: 'line',
                //         data: j.data.data_1
                //     }]
                // });
                //
                // chart3.setOption({
                //     series: [{
                //         name: 'Temperature',
                //         type: 'line',
                //         data: j.data.data_2
                //     }]
                // });
            });
        }, 2000);

    });

</script>


@endpush
