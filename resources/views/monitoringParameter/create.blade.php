@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>ADD MONITORING PARAMETER</h2><hr>
        @include('monitoringParameter._form', ['method' => 'POST', 'url' => '/monitoringParameter'])
    </div>
</div>

@endsection
