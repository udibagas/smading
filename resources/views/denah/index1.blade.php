@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>DENAH</h2>
        <hr>
        <div class="row">
            @foreach ($denahs as $d)
            <div class="col-md-3 text-center">
                <div style="height:300px;">
                    <a href="{{url('denah/'.$d->id)}}">
                        <img src="{{ asset($d->gambar) }}" alt="" class="thumbnail cover">
                    </a>
                </div>
                <a href="{{url('denah/'.$d->id)}}">
                    <h3>{{$d->gedung->name}} - Lt. {{$d->lantai}}</h3>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
