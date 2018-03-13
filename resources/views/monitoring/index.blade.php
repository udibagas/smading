@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>MONITORING <small>Manage</small></h2>
        <table class="table table-striped table-hover table-bordered" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="gedung">Gedung</th>
                    <th data-column-id="lantai">Lantai</th>
                    <th data-column-id="ruang">Ruang</th>
                    <th data-column-id="rak">Rak</th>
                    <th data-column-id="parameter">Parameter</th>
                    <th data-column-id="min_value">Min Value</th>
                    <th data-column-id="lo_value">Low Value</th>
                    <th data-column-id="hi_value">High Value</th>
                    <th data-column-id="max_value">Max Value</th>
                    <th data-column-id="unit">Unit</th>
                    <th data-column-id="commands"
                        data-formatter="commands"
                        data-sortable="false"
                        data-align="right"
                        data-header-align="right">Action</th>
                </tr>
            </thead>
        </table>

        * Min & Max Value sebagai acuan batas aman <br>
        * Low & High Value sebagai acuan batas peringatan
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

    var btn = '<a href="{{url('monitoring/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH</a>';

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url('monitoring')}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        templates: {
            header: "<div id=\"@{{ctx.id}}\" class=\"@{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\"><p style=\"display:inline-block;margin-right:20px;\">"+btn+"</p><p class=\"@{{css.search}}\"></p><p class=\"@{{css.actions}}\"></p></div></div></div>"
        },
        formatters: {
            "commands": function(column, row) {
                return "<a class=\"btn btn-xs btn-default\" href=\"{{url('monitoring')}}/" + row.id + "/edit\"><i class=\"fa fa-edit\"></i></a> " +
                    "<button class=\"btn btn-xs btn-default c-delete\" data-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i></button>";
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
                url: '{{url("monitoring")}}/' + id,
                success: function(r) {
                    console.log(r);
                    $('#bootgrid').bootgrid('reload');
                }
            });
        }
    };

</script>

@endpush
