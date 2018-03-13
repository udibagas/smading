@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>TAMBAH BUKU TAMU</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('bukutamu._form', ['method' => 'POST', 'url' => '/bukutamu'])
    </div>
</div>

@endsection
