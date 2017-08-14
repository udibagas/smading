@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT SNMP OID</h2><hr>
        @include('snmpOid._form', ['method' => 'PUT', 'url' => '/snmpOid/'.$snmpOid->id])
    </div>
</div>

@endsection
