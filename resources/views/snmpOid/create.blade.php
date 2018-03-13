@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>ADD SNMP OID</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('snmpOid._form', ['method' => 'POST', 'url' => '/snmpOid'])
    </div>
</div>

@endsection
