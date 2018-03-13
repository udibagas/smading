@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>TAMBAH RAK</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('rak._form', ['method' => 'POST', 'url' => '/rak'])
    </div>
</div>

@endsection
