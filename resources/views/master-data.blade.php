@extends('layouts.app')

@section('content')

<br><br>
<br><br>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/gedung"><i class="fa fa-building fa-5x"></i><br> GEDUNG</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/ruang"><i class="fa fa-th-large fa-5x"></i><br> RUANGAN</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/rak"><i class="fa fa-building fa-5x"></i><br> RAK</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/denah"><i class="fa fa-th fa-5x"></i><br> DENAH</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/asset"><i class="fa fa-barcode fa-5x"></i><br> ASSET</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/appliance"><i class="fa fa-mobile fa-5x"></i><br> APPLIANCE</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/sensor"><i class="fa fa-map-marker fa-5x"></i><br> SENSOR</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/user"><i class="fa fa-users fa-5x"></i><br> USERS</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/monitoringGroup"><i class="fa fa-tags fa-5x"></i><br> MONITORING GROUP</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/monitoringParameter"><i class="fa fa-sliders fa-5x"></i><br> MONITORING PARAMETER</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/modbusRegister"><i class="fa fa-list fa-5x"></i><br> MODBUS REGISTER</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/snmpOid"><i class="fa fa-list fa-5x"></i><br> SNMP OID</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/monitoring"><i class="fa fa-binoculars fa-5x"></i><br> MONITORING</a>
        </div>
    </div>
</div>

@endsection
