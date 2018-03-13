@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>TAMBAH PINTU</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('pintu._form', ['method' => 'PUT', 'url' => '/pintu/'.$pintu->id])
    </div>
</div>

@endsection
