@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>PEMANTAUAN {{$ruang->name}} ({{$ruang->code}})</h2><hr>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{$ruang->layout}}" alt="" class="img-responsive" style="width:100%"><br>
                <i>Denah {{$ruang->name}}</i>
            </div>
            <div class="col-md-8">
                ini gauge-nya
            </div>
        </div>
    </div>
</div>

@endsection
