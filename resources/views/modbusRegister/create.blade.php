@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>ADD MODBUS REGISTER</h2><hr>
        @include('modbusRegister._form', ['method' => 'POST', 'url' => '/modbusRegister'])
    </div>
</div>

@endsection
