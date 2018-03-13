@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>TAMBAH SENSOR</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('sensor._form', ['method' => 'POST', 'url' => '/sensor'])
    </div>
</div>

@endsection
