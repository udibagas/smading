@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT MONITORING</h2><hr>
        @include('monitoring._form', ['method' => 'PUT', 'url' => '/monitoring/'.$monitoring->id])
    </div>
</div>

@endsection
