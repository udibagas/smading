@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>TAMBAH DENAH</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('denah._form', ['method' => 'PUT', 'url' => '/denah/'.$denah->id])
    </div>
</div>

@endsection
