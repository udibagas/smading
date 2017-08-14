@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH RUANG</h2><hr>
        @include('ruang._form', ['method' => 'PUT', 'url' => '/ruang/'.$ruang->id])
    </div>
</div>

@endsection
