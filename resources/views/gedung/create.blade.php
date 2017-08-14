@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH GEDUNG</h2><hr>
        @include('gedung._form', ['method' => 'POST', 'url' => '/gedung'])
    </div>
</div>

@endsection
