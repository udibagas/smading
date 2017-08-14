@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_title">
        <div class="pull-right">
            <div class="btn-group">
                <a href="/sop" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                <a href="/sop/{{ $sop->id }}/edit" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
        <h2>{{ $sop->judul }} <small>{{ $sop->nomor }}</small></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <img src="{{ asset($sop->gambar) }}" alt="{{ $sop->judul }}" class="thumbnail" style="margin:auto;">
        <br>
        {!! $sop->isi !!}
    </div>
</div>

@endsection
