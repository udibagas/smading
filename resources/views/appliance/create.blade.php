@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>TAMBAH APPLIANCE</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('appliance._form', ['method' => 'POST', 'url' => '/appliance'])
    </div>
</div>

@endsection
