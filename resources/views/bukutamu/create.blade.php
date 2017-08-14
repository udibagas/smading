@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH BUKU TAMU</h2><hr>
        @include('bukutamu._form', ['method' => 'POST', 'url' => '/bukutamu'])
    </div>
</div>

@endsection
