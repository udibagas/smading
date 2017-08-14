@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT MODBUS REGISTER</h2><hr>
        @include('modbusRegister._form', ['method' => 'PUT', 'url' => '/modbusRegister/'.$modbusRegister->id])
    </div>
</div>

@endsection
