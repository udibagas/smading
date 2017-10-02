@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>LOG PINTU {{$pintu->code}} : {{$pintu->name}}</h2><hr>
        <div class="row">
            <div class="col-md-3">
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
                            <td>
                                {!! $pintu->status ? "<span class=\"label label-success\">TERTUTUP</span>" : "<span class=\"label label-danger\">TERBUKA</span>" !!}
                            </td>
                        </tr>
                        <tr>
                            <td>Akses Terakhir</td><td>{{ $pintu->last_access_time ? $pintu->last_access_time->diffForHumans() : '' }}</td>
                        </tr>
                        <tr>
                            <td>Akses Oleh</td><td>{{ $pintu->last_access_by }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-9">
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
    }, 3000);

</script>

@endpush
