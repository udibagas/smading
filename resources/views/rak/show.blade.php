@extends('layouts.app')

@section('content')

<h1>PEMANTAUAN RAK {{$rak->code}} : {{$rak->name}}</h1>

<div class="row">
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h3>KELISTRIKAN</h3>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-6">
                        <h5>ARUS OUTPUT ETS</h5>
                        <div id="arus_ets"> </div>
                    </div>
                    <div class="col-md-6">
                        <h5>ARUS OUTPUT UPS</h5>
                        <div id="arus_ets"> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>DAYA OUTPUT ETS</h5>
                        <div id="dayaets"> </div>
                    </div>
                    <div class="col-md-6">
                        <h5>DAYA OUTPUT UPS</h5>
                        <div id="dayaets"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h3>LINGKUNGAN</h3>
            </div>
            <div class="x_content">
                <h4>AREA DEPAN</h4>
                <div class="row">
                    <div class="col-md-3">
                        <h5>SUHU</h5>
                        <div id="suhu_depan" style="height:200px;"> </div>
                    </div>
                    <div class="col-md-3">
                        <h5>KELEMBABAN</h5>
                        <div id="lembabdepan"> </div>
                    </div>
                    <div class="col-md-3">
                        <h5>PINTU</h5>
                        <div id="pintudepan"> </div>
                    </div>
                    <div class="col-md-3">
                        <h5>GAS</h5>
                        <div id="gasdepan"> </div>
                    </div>
                </div>
                <h4>AREA BELAKANG</h4>
                <div class="row">
                    <div class="col-md-3">
                        <h5>SUHU</h5>
                        <div id="suhubelakang"> </div>
                    </div>
                    <div class="col-md-3">
                        <h5>KELEMBABAN</h5>
                        <div id="lembabbelakang"> </div>
                    </div>
                    <div class="col-md-3">
                        <h5>PINTU</h5>
                        <div id="pintubelakang"> </div>
                    </div>
                    <div class="col-md-3">
                        <h5>GAS</h5>
                        <div id="gasbelakang"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="x_panel">
            <div class="x_title">
                <h3>PAC</h3>
            </div>
            <div class="x_content">
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
@foreach(['arus_depan', 'arus_belakang', 'daya_depan', 'daya_belakang', 'suhu_depan', 'suhu_belakang', 'lembab_depan', 'lembab_belakang'] as $m)
    var chart{{$m}} = echarts.init(document.getElementById('{{$m}}'));
    chart{{$m}}.setOption({
        series: [{
            type: 'gauge',
            min: 0,
            max: 100,
            axisLine: {
                show: true,
                lineStyle: {
                    color: [
                        [0.5, 'red'],
                        [0.7, 'green'],
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
                formatter: '{value}C',
                offsetCenter: ['0%', 65],
                textStyle: {
                    color: 'auto',
                    fontSize: 20
                }
            },
            data: [{value: 20, name: '{{$m}}'}]
        }]
    });

@endforeach
</script>

@endpush
