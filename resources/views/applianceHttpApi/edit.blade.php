@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>EDIT APPLIANCE HTTP API</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('applianceHttpApi._form', ['method' => 'PUT', 'url' => '/applianceHttpApi/'.$applianceHttpApi->id])
    </div>
</div>

@endsection
