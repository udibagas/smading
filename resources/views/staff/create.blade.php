@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>TAMBAH HAK AKSES</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('staff._form', ['method' => 'POST', 'url' => '/staff'])
    </div>
</div>

@endsection
