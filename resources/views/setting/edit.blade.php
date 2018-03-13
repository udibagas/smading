@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2 class="x_title">EDIT SETTING</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('setting._form', ['method' => 'PUT', 'url' => '/setting/'.$setting->id])
    </div>
</div>

@endsection
