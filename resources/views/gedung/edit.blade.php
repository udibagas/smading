@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>EDIT GEDUNG</h2><hr>
        @include('gedung._form', ['method' => 'PUT', 'url' => '/gedung/'.$gedung->id])
    </div>
</div>

@endsection
