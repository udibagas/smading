@extends('layouts.app')

@section('content')

<br><br>
<br><br>
<br><br>

<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('bukutamu')}}"><i class="fa fa-book fa-5x"></i><br> BUKU TAMU</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('sop')}}"><i class="fa fa-sitemap fa-5x"></i><br> SOP</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('hak-akses')}}"><i class="fa fa-key fa-5x"></i><br> HAK AKSES</a>
        </div>
    </div>
    <div class="col-md-2">
        <div class="menu-holder" style="margin-bottom:40px;">
            <a href="{{url('kompetensi')}}"><i class="fa fa-graduation-cap fa-5x"></i><br> KOMPETENSI</a>
        </div>
    </div>
</div>

@endsection
