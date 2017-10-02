@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>Denah Lt. {{$denah->lantai}} {{$denah->gedung->name}}</h2>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>Gedung</td><td>{{$denah->gedung->name}}</td>
                        </tr>
                        <tr>
                            <td>Lantai</td><td>{{$denah->lantai}}</td>
                        </tr>
                        <tr>
                            <td>File</td>
                            <td>
                                <a href="{{asset($denah->gambar)}}" target="_blank">
                                    {{$denah->gambar}}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Waktu Input</td><td>{{$denah->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Waktu Update</td><td>{{$denah->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9">
                <img src="{{ asset($denah->gambar) }}" alt="" class="img-responsive">
            </div>
        </div>
    </div>
</div>

@endsection
