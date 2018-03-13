@extends('layouts.app')

@section('title')
<i class="fa fa-dashboard"></i> DASHBOARD
@endsection

@section('content')

<br>

<div class="row">
    <div class="col-md-2">
        <div class="alert alert-success text-center">
            <h5>GAS</h5><hr>
            <h4>NORMAL</h4>
        </div>
    </div>
    <div class="col-md-2">
        <div class="alert alert-success text-center">
            <h5>AIR</h5><hr>
            <h4>NORMAL</h4>
        </div>
    </div>
    <div class="col-md-2">
        <div class="alert alert-success text-center">
            <h5>SUHU</h5><hr>
            <h4>NORMAL</h4>
        </div>
    </div>
    <div class="col-md-2">
        <div class="alert alert-success text-center">
            <h5>KELEMBABAN</h5><hr>
            <h4>NORMAL</h4>
        </div>
    </div>
    <div class="col-md-2">
        <div class="alert alert-success text-center">
            <h5>PUE</h5><hr>
            <h4>EFISIEN</h4>
        </div>
    </div>
    <div class="col-md-2">
        <div class="alert alert-success text-center">
            <h5>DAYA PLN</h5><hr>
            <h4>NORMAL</h4>
        </div>
    </div>
</div>

<div ng-app="app" ng-controller="MainController">
    <div class="x_panel">
        <div class="x_content">
            <div role="tabpanel">
                <ul class="nav nav-tabs bar_tabs" role="tablist">
                    @foreach ($params as $p)
                    <li role="presentation" class="{{ $param->id == $p->id ? "active" : ""}}"><a href="{{url('/?parameter_id='.$p->id)}}" role="tab">{{ strtoupper($p->name) }}</a>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in">
                        <div class="row">
                            @foreach ($param->monitoring as $m)
                            <div class="col-md-2 col-sm-4">
                                <div class="" style="height:270px;border:1px solid #ddd;padding:5px;border-radius:2px;margin-bottom:20px;" id="chart{{ $m->id }}"> </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
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
    @foreach ($param->monitoring as $m)
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
                            [{{$m->min_value/$m->monitoringParameter->max_value}}, '#ff4500'],
                            [{{$m->lo_value/$m->monitoringParameter->max_value}},'orange'],
                            [{{$m->hi_value/$m->monitoringParameter->max_value}}, 'green'],
                            [{{$m->max_value/$m->monitoringParameter->max_value}}, 'orange'],
                            [1, '#ff4500']
                        ],
                        width: 10
                    },
                },
                axisTick: {
                    show: false,
                    // splitNumber: 9,
                    // length: 8,
                    // lineStyle: {
                    //     color: '#eee',
                    //     width: 1,
                    //     type: 'solid'
                    // }
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
                    formatter: '{value}{{$param->unit}}',
                    offsetCenter: ['0%', 65],
                    textStyle: {
                        color: 'auto',
                        fontSize: 20
                    }
                },
                data: [{value: 0, name: '{{$m->ruang->name}} {{$m->rak ? $m->rak->name : ""}}'}]
            }]
        });

        var poll{{$m->id}} = function() {
            var url = '{{url('poll')}}?ruang_id={{$m->ruang_id}}&rak_id={{$m->rak_id}}&monitoring_parameter_id={{$m->monitoring_parameter_id}}';
            $http.get(url).then(function(j) {
                console.log(j.data);
                chart{{$m->id}}.setOption({
                    series: [{
                        data: [{value: j.data, name: '{{$m->ruang->name}} {{$m->rak ? $m->rak->name : ""}}'}]
                    }]
                });
            });
        };

        poll{{$m->id}}();

    @endforeach

    $interval(function() {
        @foreach($param->monitoring as $m)
            poll{{$m->id}}();
        @endforeach
    }, 5000);

});

</script>

@endpush
