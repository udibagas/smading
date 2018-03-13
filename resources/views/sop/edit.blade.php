@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <h2>Tambah SOP</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @include('sop._form', ['method' => 'PUT', 'url' => '/sop/'.$sop->id])
    </div>
</div>

@endsection
