@extends('layouts.app')

@section('content')

<br><br>
<br><br>

<div class="row">
    <div class="col-md-4">

    </div>
    @foreach ($monitoringGroups as $g)
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="/monitoringGroup/{{ $g->id }}">
                <i class="fa fa-{{ $g->icon }} fa-5x"></i><br>
                {{ strtoupper($g->name) }}
            </a>
        </div>
    </div>
    @endforeach
</div>

@endsection
