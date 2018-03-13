@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>EDIT APPLIANCE</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('appliance._form', ['method' => 'PUT', 'url' => '/appliance/'.$appliance->id])
    </div>
</div>

@endsection
