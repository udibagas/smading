@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2 class="x_title">TAMBAH SETTING</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('setting._form', ['method' => 'POST', 'url' => '/setting'])
    </div>
</div>

@endsection
