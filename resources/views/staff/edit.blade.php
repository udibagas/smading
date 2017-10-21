@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT STAFF</h2><hr>
        @include('staff._form', ['method' => 'PUT', 'url' => '/staff/'.$staff->id])
    </div>
</div>

@endsection
