@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH DENAH</h2><hr>
        @include('denah._form', ['method' => 'PUT', 'url' => '/denah/'.$denah->id])
    </div>
</div>

@endsection
