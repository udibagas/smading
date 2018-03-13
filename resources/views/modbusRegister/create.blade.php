@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>ADD MODBUS REGISTER</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('modbusRegister._form', ['method' => 'POST', 'url' => '/modbusRegister'])
    </div>
</div>

@endsection
