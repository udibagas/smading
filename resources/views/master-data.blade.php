@extends('layouts.app')

@section('title')
<i class="fa fa-database"></i> MASTER DATA
@endsection

@section('content')

<br><br>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('gedung')}}"><i class="fa fa-building fa-5x"></i><br> GEDUNG</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('ruang')}}"><i class="fa fa-th-large fa-5x"></i><br> RUANGAN</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('pintu')}}"><i class="fa fa-pause fa-5x"></i><br> PINTU</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('rak')}}"><i class="fa fa-building fa-5x"></i><br> RAK</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('denah')}}"><i class="fa fa-th fa-5x"></i><br> DENAH</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('asset')}}"><i class="fa fa-barcode fa-5x"></i><br> ASSET</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('appliance')}}"><i class="fa fa-mobile fa-5x"></i><br> APPLIANCE</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('sensor')}}"><i class="fa fa-map-marker fa-5x"></i><br> SENSOR</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('monitoringGroup')}}"><i class="fa fa-tags fa-5x"></i><br> MONITORING GROUP</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('monitoringParameter')}}"><i class="fa fa-sliders fa-5x"></i><br> MONITORING PARAMETER</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('modbusRegister')}}"><i class="fa fa-list fa-5x"></i><br> MODBUS REGISTER</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('snmpOid')}}"><i class="fa fa-list fa-5x"></i><br> SNMP OID</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('applianceHttpApi')}}"><i class="fa fa-list fa-5x"></i><br> APPLIANCE HTTP API</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('monitoring')}}"><i class="fa fa-binoculars fa-5x"></i><br> MONITORING</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('user')}}"><i class="fa fa-users fa-5x"></i><br> USERS</a>
        </div>
    </div>
</div>

@endsection
