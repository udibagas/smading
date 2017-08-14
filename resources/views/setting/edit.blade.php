@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">EDIT SETTING</h2>
    </div>
    <div class="panel-body">
        @include('setting._form', ['method' => 'PUT', 'url' => '/setting/'.$setting->id])
    </div>
</div>

@endsection
