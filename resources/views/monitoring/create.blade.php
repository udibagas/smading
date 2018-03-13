@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>ADD MONITORING</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('monitoring._form', ['method' => 'POST', 'url' => '/monitoring'])
    </div>
</div>

@endsection
