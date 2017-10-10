@extends('layouts.app')

@section('title')
<i class="fa fa-hdd-o"></i> REKAMAN
@endsection

@section('content')

<br><br>
<br><br>
<br><br>

<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('logPintu')}}"><i class="fa fa-pause fa-5x"></i><br> PINTU</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('log')}}"><i class="fa fa-bell fa-5x"></i><br> ALARM</a>
        </div>
    </div>
</div>

@endsection
