@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>LOG AKSES PINTU</h2><hr>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="created_at">Waktu Akses</th>
                    <th data-column-id="gedung">Gedung</th>
                    <th data-column-id="lantai">Lantai</th>
                    <th data-column-id="ruang">Ruang</th>
                    <th data-column-id="name">Nama</th>
                    <th data-column-id="code">Kode</th>
                    <th data-column-id="description">Deskripsi</th>
                    <th data-column-id="ip_address">IP Address</th>
                    <th data-formatter="stts">Status</th>
                    <th data-column-id="access_by">Akses Oleh</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url('logPintu')}}',
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
