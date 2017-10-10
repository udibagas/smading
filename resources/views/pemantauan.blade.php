@extends('layouts.app')

@section('title')
<i class="fa fa-binoculars"></i> PEMANTAUAN
@endsection


@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-list"></i> PARAMETER</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($monitoringGroups as $g)
            <div class="col-md-4">
                <div class="menu-holder" style="margin-bottom:40px;">
                    <a href="{{url('monitoringGroup/'.$g->id)}}">
                        <i class="fa fa-{{ $g->icon }} fa-4x"></i><br> {{ strtoupper($g->name) }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-th-large"></i> RUANG</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($ruangs as $r)
            <div class="col-md-4">
                <div class="menu-holder" style="margin-bottom:40px;">
                    <a href="{{url('ruang/'.$r->id)}}">
                        <i class="fa fa-th-large fa-4x"></i><br>
                        {{strtoupper($r->code)}}
                        {!! strtoupper('<br><small>'.$r->name.'</small>') !!}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><img src="{{ asset('images/door-open.png')}}" alt="" style="height:20px;"> PINTU</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($pintus as $p)
            <div class="col-md-4 text-center">
                <div id="status{{$p->id}}" class="alert-{{$p->status ? 'success' : 'danger' }}" style="padding:10px 0;margin-bottom:30px;">
                    <a href="{{url('pintu/'.$p->id)}}">
                        <img id="gambar_pintu{{$p->id}}" src="{{ $p->status ? asset('images/door-close.png') : asset('images/door-open.png') }}" alt="" style="height:50px;">
                        <h5 style="font-weight:bold;">
                            {{strtoupper($p->code)}}<br>
                            <small>{{$p->name}}</small>
                        </h5>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><img src="{{ asset('images/rack-icon.png')}}" alt="" style="height:20px;"> RAK</h4>
            </div>
        </div>
        <div class="row">
            @foreach ($raks as $r)
            <div class="col-md-4 text-center">
                <a href="{{url('rak/'.$r->id)}}">
                    <img src="{{asset('images/rack-icon-o.png')}}" alt="" style="height:50px;">
                    <h5 style="font-weight:bold;">
                        {{strtoupper($r->code)}}<br>
                        <small>{{$r->name}}</small>
                    </h5>
                </a>
            </div>
            @endforeach
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
