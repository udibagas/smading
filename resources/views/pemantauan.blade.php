@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h3 class="text-center">PEMANTAUAN</h3>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">PARAMETER</h4>
                    </div>
                    <div class="list-group">
                        @foreach ($monitoringGroups as $g)
                        <a href="{{url('monitoringGroup/'.$g->id)}}" class="list-group-item">
                            <i class="fa fa-{{ $g->icon }}"></i>
                            {{ strtoupper($g->name) }}
                            <span class="badge"><i class="fa fa-angle-double-right"></i></span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">RUANG</h4>
                    </div>
                    <div class="list-group">
                        @foreach ($ruangs as $r)
                        <a href="{{url('ruang/'.$r->id)}}" class="list-group-item">
                            <i class="fa fa-th-large"></i> {{strtoupper($r->code.': '.$r->name)}}
                            <span class="badge"><i class="fa fa-angle-double-right"></i></span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">PINTU</h4>
                    </div>
                    <div class="list-group">
                        @foreach ($pintus as $p)
                        <a href="{{url('pintu/'.$p->id)}}" class="list-group-item">
                            <i class="fa fa-pause"></i> {{strtoupper($p->code.': '.$p->name)}}
                            <span class="badge"><i class="fa fa-angle-double-right"></i></span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">RAK</h4>
                    </div>
                    <div class="list-group">
                        @foreach ($raks as $r)
                            <a href="{{url('rak/'.$r->id)}}" class="list-group-item">
                                <i class="fa fa-building"></i> {{strtoupper($r->code.': '.$r->name)}}
                                <span class="badge"><i class="fa fa-angle-double-right"></i></span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
