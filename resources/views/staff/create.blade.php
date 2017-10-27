@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH HAK AKSES</h2><hr>
        @include('staff._form', ['method' => 'POST', 'url' => '/staff'])
    </div>
</div>

@endsection
