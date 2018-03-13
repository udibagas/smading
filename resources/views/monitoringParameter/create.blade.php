@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>ADD MONITORING PARAMETER</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('monitoringParameter._form', ['method' => 'POST', 'url' => '/monitoringParameter'])
    </div>
</div>

@endsection
