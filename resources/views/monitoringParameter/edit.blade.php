@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>EDIT MONITORING PARAMETER</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('monitoringParameter._form', ['method' => 'PUT', 'url' => '/monitoringParameter/'.$monitoringParameter->id])
    </div>
</div>

@endsection
