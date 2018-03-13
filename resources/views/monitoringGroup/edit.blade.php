@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>EDIT MONITORING GROUP</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('monitoringGroup._form', ['method' => 'PUT', 'url' => '/monitoringGroup/'.$monitoringGroup->id])
    </div>
</div>

@endsection
