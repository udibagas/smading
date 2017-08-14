@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH RAK</h2><hr>
        @include('rak._form', ['method' => 'PUT', 'url' => '/rak/'.$rak->id])
    </div>
</div>

@endsection
