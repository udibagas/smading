@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>HAK AKSES</h2><hr>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id">ID</th>
                    <th data-column-id="nama">Nama</th>
                    <th data-column-id="jabatan">Jabatan</th>
                    <th data-column-id="active" data-formatter="active">Aktif</th>
                    <th data-column-id="akses">Hak Akses</th>
                    <th data-column-id="commands"
                        data-formatter="commands"
                        data-sortable="false"
                        data-align="right"
                        data-header-align="right">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url('staff')}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {
            "commands": function(column, row) {
                return "<a class=\"btn btn-xs btn-default\" href=\"{{url('staff')}}/" + row.id + "/edit\"><i class=\"fa fa-edit\"></i></a> " +
                    "<button class=\"btn btn-xs btn-default c-delete\" data-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i></button>";
            },
            "active": function(column, row) {
                return row.active
                    ? "<span class=\"label label-success\">Ya</span>"
                    : "<span class=\"label label-danger\">Tidak</span>";
            }
        }
    }).on("loaded.rs.jquery.bootgrid", function() {
        grid.find(".c-delete").on("click", function(e) {
            deleteData($(this).data("id"));
        });
    });

    var deleteData = function(id) {
        if (confirm('Anda yakin akan menghapus data ini?')) {
            $.ajax({
                type: 'POST',
                data: {'_method' : 'DELETE'},
                url: '{{url("staff")}}/' + id,
                success: function(r) {
                    $('#bootgrid').bootgrid('reload');
                }
            });
        }
    };

</script>

@endpush
