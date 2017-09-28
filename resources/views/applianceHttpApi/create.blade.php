@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>ADD APPLIANCE HTTP API</h2><hr>
        @include('applianceHttpApi._form', ['method' => 'POST', 'url' => '/applianceHttpApi'])
    </div>
</div>

@endsection
