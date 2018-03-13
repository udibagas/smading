@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>EDIT GEDUNG</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('gedung._form', ['method' => 'PUT', 'url' => '/gedung/'.$gedung->id])
    </div>
</div>

@endsection
