@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>EDIT RUANG</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('ruang._form', ['method' => 'PUT', 'url' => '/ruang/'.$ruang->id])
    </div>
</div>

@endsection
