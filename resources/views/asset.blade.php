@extends('layouts.app')

@section('content')

<br><br>
<br><br>
<br><br>

<div class="row">
    <div class="col-md-2"> </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('capacity-planning')}}"><i class="fa fa-tasks fa-5x"></i><br> CAPACITY PLANNING</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('pemasangan-perangkat')}}"><i class="fa fa-wrench fa-5x"></i><br> PEMASANGAN PERANGKAT</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('pemindahan-perangkat')}}"><i class="fa fa-retweet fa-5x"></i><br> PEMINDAHAN PERANGKAT</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('penggantian-perangkat')}}"><i class="fa fa-exchange fa-5x"></i><br> PENGGANTIAN PERANGKAT</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('pemeliharaan-perangkat')}}"><i class="fa fa-recycle fa-5x"></i><br> PEMELIHARAAN PERANGKAT</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('penghapusan-perangkat')}}"><i class="fa fa-trash-o fa-5x"></i><br> PENGHAPUSAN PERANGKAT</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('audit')}}"><i class="fa fa-pencil-square-o fa-5x"></i><br> AUDIT</a>
        </div>
    </div>
</div>


@endsection
