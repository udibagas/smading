@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH RUANG</h2><hr>
        @include('ruang._form', ['method' => 'POST', 'url' => '/ruang'])
    </div>
</div>

@endsection
