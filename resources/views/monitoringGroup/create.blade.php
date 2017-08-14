@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>ADD MONITORING GROUP</h2><hr>
        @include('monitoringGroup._form', ['method' => 'POST', 'url' => '/monitoringGroup'])
    </div>
</div>

@endsection
