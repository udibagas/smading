<div class="panel panel-success">
    <div class="panel-heading text-center">
        <h3 class="panel-title">KELEMBABAN RATA - RATA RUANGAN</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            @for ($i=0;$i<4;$i++)
            <div class="col-md-3">
                <div id="kelembaban{{$i}}" style="height:200px;"> </div>
            </div>
            @endfor
        </div>
    </div>
</div>

@push('scripts')

<script type="text/javascript">
    @for ($i=0;$i<4;$i++)
      var echartGauge{{$i}} = echarts.init(document.getElementById('kelembaban{{$i}}'));

            echartGauge{{$i}}.setOption({
              tooltip: {
                formatter: "{a} <br/>{b} : {c}%"
              },
              toolbox: {
                show: false,
              },
              series: [{
                name: 'Performance',
                type: 'gauge',
                center: ['50%', '50%'],
                startAngle: 220,
                endAngle: -40,
                min: 0,
                max: 100,
                precision: 0,
                splitNumber: 10,
                axisLine: {
                  show: true,
                  lineStyle: {
                    color: [
                      [0.2, '#ff4500'],
                      [0.4, 'orange'],
                      [0.8, 'lightgreen'],
                      [0.9, 'orange'],
                      [1, '#ff4500']
                    ],
                    width: 15
                  }
                },
                axisTick: {
                  show: true,
                  splitNumber: 9,
                  length: 8,
                  lineStyle: {
                    color: '#eee',
                    width: 1,
                    type: 'solid'
                  }
                },
                axisLabel: {
                  show: true,
                  formatter: function(v) {
                    switch (v + '') {
                      case '10':
                        return '10';
                      case '30':
                        return '30';
                      case '60':
                        return '60';
                      case '90':
                        return '90';
                      default:
                        return '';
                    }
                  },
                  textStyle: {
                    color: '#333'
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
                  show: false,
                //   offsetCenter: ['-65%', -10],
                  offsetCenter: ['0%', 40],
                  textStyle: {
                    color: '#333',
                    fontSize: 15
                  }
                },
                detail: {
                  show: true,
                  backgroundColor: 'rgba(0,0,0,0)',
                  borderWidth: 0,
                  borderColor: '#ccc',
                  width: 100,
                  height: 40,
                  offsetCenter: ['0%', 50],
                  formatter: '{value}%',
                  textStyle: {
                    color: 'auto',
                    fontSize: 30
                  }
                },
                data: [{
                  value: 30,
                  name: 'Performance'
                }]
              }]
            });
            @endfor
</script>

@endpush
