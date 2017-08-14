@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT MONITORING GROUP</h2><hr>
        @include('monitoringGroup._form', ['method' => 'PUT', 'url' => '/monitoringGroup/'.$monitoringGroup->id])
    </div>
</div>

@endsection
