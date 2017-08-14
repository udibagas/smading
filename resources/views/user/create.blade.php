@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>ADD USER</h2><hr>
        @include('user._form', ['method' => 'POST', 'url' => '/user'])
    </div>
</div>

@endsection
