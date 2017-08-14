@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>TAMBAH APPLIANCE</h2><hr>
        @include('appliance._form', ['method' => 'POST', 'url' => '/appliance'])
    </div>
</div>

@endsection
