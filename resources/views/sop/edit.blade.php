@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>Tambah SOP</h2><hr>
        @include('sop._form', ['method' => 'PUT', 'url' => '/sop/'.$sop->id])
    </div>
</div>

@endsection
