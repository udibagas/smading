@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT MONITORING PARAMETER</h2><hr>
        @include('monitoringParameter._form', ['method' => 'PUT', 'url' => '/monitoringParameter/'.$monitoringParameter->id])
    </div>
</div>

@endsection
