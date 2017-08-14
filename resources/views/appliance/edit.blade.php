@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT APPLIANCE</h2><hr>
        @include('appliance._form', ['method' => 'PUT', 'url' => '/appliance/'.$appliance->id])
    </div>
</div>

@endsection
