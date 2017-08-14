@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>ADD MONITORING</h2><hr>
        @include('monitoring._form', ['method' => 'POST', 'url' => '/monitoring'])
    </div>
</div>

@endsection
