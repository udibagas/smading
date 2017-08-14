@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH SENSOR</h2><hr>
        @include('sensor._form', ['method' => 'POST', 'url' => '/sensor'])
    </div>
</div>

@endsection
