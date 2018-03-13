@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>ADD APPLIANCE HTTP API</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('applianceHttpApi._form', ['method' => 'POST', 'url' => '/applianceHttpApi'])
    </div>
</div>

@endsection
