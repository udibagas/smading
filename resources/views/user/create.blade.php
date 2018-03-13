@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>ADD USER</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('user._form', ['method' => 'POST', 'url' => '/user'])
    </div>
</div>

@endsection
