@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT USER</h2><hr>
        @include('user._form', ['method' => 'PUT', 'url' => '/user/'.$user->id])
    </div>
</div>

@endsection
