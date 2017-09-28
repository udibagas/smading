@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT APPLIANCE HTTP API</h2><hr>
        @include('applianceHttpApi._form', ['method' => 'PUT', 'url' => '/applianceHttpApi/'.$applianceHttpApi->id])
    </div>
</div>

@endsection
