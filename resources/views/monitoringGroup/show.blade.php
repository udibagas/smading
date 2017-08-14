@extends('layouts.app')

@section('content')

<div ng-app="app" class="panel panel-default" ng-controller="MainController">
    <div class="panel-body">
        <h2>
            {{ strtoupper($monitoringGroup->name) }}
            <small>Pemantauan {{$monitoringGroup->name}} realtime</small>
        </h2><hr>

        <!-- LOOP PARAMETER -->
        @foreach ($monitoringGroup->parameter as $p)
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title text-center">
                    <a href="#">{{ strtoupper($p->name) }}</a>
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <!-- LOOP RUANG -->
                    @foreach ($p->monitoring as $m)
                    <div class="col-md-2">
                        <div style="height:250px;border:1px solid #ddd;margin-bottom:20px;" id="chart{{ $m->id }}"> </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

var app = angular.module('app', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.controller('MainController', function($scope, $http, $interval) {
    @foreach($monitoringGroup->parameter as $p)
        @foreach($p->monitoring as $m)
            var chart{{$m->id}} = echarts.init(document.getElementById('chart{{$m->id}}'));
            chart{{$m->id}}.setOption({
                series: [{
                    type: 'gauge',
                    min: {{$m->monitoringParameter->min_value}},
                    max: {{$m->monitoringParameter->max_value}},
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: [
                                [{{$m->min_value/$m->monitoringParameter->max_value}}, 'red'],
                                [{{$m->max_value/$m->monitoringParameter->max_value}}, 'green'],
                                [1, 'red']
                            ],
                            width: 10
                        },
                    },
                    axisTick: {
                        show: false,
                        splitNumber: 9,
                        length: 8,
                        lineStyle: {
                            color: '#eee',
                            width: 1,
                            type: 'solid'
                        }
                    },
                    splitLine: {
                        show: true,
                        length: 15,
                        lineStyle: {
                            color: '#eee',
                            width: 1,
                            type: 'solid'
                        }
                    },
                    pointer: {
                        length: '80%',
                        width: 3,
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
                        formatter: '{value}{{$p->unit}}',
                        offsetCenter: ['0%', 65],
                        textStyle: {
                            color: 'auto',
                            fontSize: 20
                        }
                    },
                    data: [{value: 0, name: '{{$m->ruang->name}}'}]
                }]
            });

            var poll{{$m->id}} = function() {
                var url = '/poll?ruang_id={{$m->ruang_id}}&rak_id={{$m->rak_id}}&monitoring_parameter_id={{$m->monitoring_parameter_id}}';
                $http.get(url).then(function(j) {
                    console.log(j.data);
                    chart{{$m->id}}.setOption({
                        series: [{
                            data: [{value: j.data, name: '{{$m->ruang->name}}'}]
                        }]
                    });
                });
            };

            poll{{$m->id}}();

        @endforeach
    @endforeach

    $interval(function() {
        @foreach($monitoringGroup->parameter as $p)
            @foreach($p->monitoring as $m)
                poll{{$m->id}}();
            @endforeach
        @endforeach
    }, 5000);

});

</script>

@endpush
