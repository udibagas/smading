@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>ADD SNMP OID</h2><hr>
        @include('snmpOid._form', ['method' => 'POST', 'url' => '/snmpOid'])
    </div>
</div>

@endsection
