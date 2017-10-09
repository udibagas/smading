@extends('layouts.app')

@section('content')

<div class="alert alert-success">
    <h4 style="margin-bottom:0;">{{$pintu->code}} : {{strtoupper($pintu->name)}}</h4>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title text-center">STATUS PINTU</h2>
            </div>
            <div class="alert alert-{{$pintu->status ? 'success' : 'danger'}}"  style="margin-bottom:0;">
                <img id="gambar_pintu" src="{{ $pintu->status ? asset('images/door-close.png') : asset('images/door-open.png') }}" class="img-responsive" alt="">
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">DETAIL PINTU</h2>
            </div>
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <td>Gedung</td>
                        <td>
                            <a href="{{url('gedung/'.$pintu->gedung_id)}}">
                                {{ $pintu->gedung->name }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Ruang</td>
                        <td>
                            <a href="{{url('ruang/'.$pintu->ruang_id)}}">
                                {{ $pintu->ruang->name }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Lantai</td><td>{{ $pintu->ruang->lantai }}</td>
                    </tr>
                    <tr>
                        <td>Kode</td><td>{{ $pintu->code }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td><td>{{ $pintu->name }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td><td>{{ $pintu->description }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td id="status">
                            {!! $pintu->status ? "<span class=\"label label-success\">TERTUTUP</span>" : "<span class=\"label label-danger\">TERBUKA</span>" !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Akses Terakhir</td>
                        <td id="last_access_time">
                            {{ $pintu->last_access_time ? $pintu->last_access_time->diffForHumans() : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>Akses Oleh</td>
                        <td id="last_access_by">
                            {{ $pintu->last_access_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">LOG AKSES</h3>
            </div>
            <table class="table table-striped table-hover" id="bootgrid">
                <thead>
                    <tr>
                        <th data-column-id="created_at">Waktu Akses</th>
                        <th data-column-id="access_by">Diakses Oleh</th>
                        <th data-formatter="stts">Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url('logPintu?pintu_id='.$pintu->id)}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {
            "stts": function(column, row) {
                return row.stts == 1
                    ? "<span class=\"label label-success\">Tutup</span>"
                    : "<span class=\"label label-danger\">Buka</span>";
            }
        }
    });

    setInterval(function() {
        $('#bootgrid').bootgrid('reload');
        $.get('{{url("pintu/".$pintu->id)}}', function(j) {
            status = j.stts
                ? '<span class="label label-success">TERTUTUP</span>'
                : '<span class="label label-danger">TERBUKA</span>';

            gambar = j.stts
                ? "{{asset('images/door-close.png')}}"
                : "{{asset('images/door-open.png')}}";

            $('#status').html(status);
            $('#last_access_time').html(j.last_access_time);
            $('#last_access_by').html(j.last_access_by);
            $('#gambar_pintu').attr('src', gambar);

        }, 'json');
    }, 3000);

</script>

@endpush
