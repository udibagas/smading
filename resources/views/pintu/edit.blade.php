@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH PINTU</h2><hr>
        @include('pintu._form', ['method' => 'PUT', 'url' => '/pintu/'.$pintu->id])
    </div>
</div>

@endsection
