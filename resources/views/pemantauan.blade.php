@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-list"></i> PARAMETER</h4>
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
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-th-large"></i> RUANG</h4>
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
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><img src="{{ asset('images/door-open.png')}}" alt="" style="height:20px;"> PINTU</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    @foreach ($pintus as $p)
                    <div class="col-md-4 text-center">
                        <div id="status{{$p->id}}" class="alert-{{$p->status ? 'success' : 'danger' }}" style="padding:20px 0;">
                            <a href="{{url('pintu/'.$p->id)}}">
                                <img id="gambar_pintu{{$p->id}}" src="{{ $p->status ? asset('images/door-close.png') : asset('images/door-open.png') }}" alt="" style="height:100px;">
                                <h4>
                                    {{strtoupper($p->code)}}<br>
                                    <small>{{$p->name}}</small>
                                </h4>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><img src="{{ asset('images/rack-icon.png')}}" alt="" style="height:20px;"> RAK</h4>
            </div>
            <div class="list-group">
                @foreach ($raks as $r)
                    <a href="{{url('rak/'.$r->id)}}" class="list-group-item">
                        <img src="{{ asset('images/rack-icon-o.png')}}" alt="" style="height:20px;"> {{strtoupper($r->code.': '.$r->name)}}
                        <span class="badge"><i class="fa fa-angle-double-right"></i></span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
setInterval(function() {
    // get status pintu
    @foreach ($pintus as $p)
    $.get('{{url("pintu/".$p->id)}}', function(j) {

        if (j.stts) {
            $('#status{{$p->id}}').removeClass('alert-danger').addClass('alert-success');
            $('#gambar_pintu{{$p->id}}').attr('src', "{{asset('images/door-close.png')}}");
        } else {
            $('#status{{$p->id}}').removeClass('alert-success').addClass('alert-danger');
            $('#gambar_pintu{{$p->id}}').attr('src', "{{asset('images/door-open.png')}}");
        }


    }, 'json');
    @endforeach

}, 3000);
</script>

@endpush
