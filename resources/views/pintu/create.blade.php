@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH PINTU</h2><hr>
        @include('pintu._form', ['method' => 'POST', 'url' => '/pintu'])
    </div>
</div>

@endsection
