@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>MODBUS REGISTER <small>Manage</small></h2><hr>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id">ID</th>
                    <th data-column-id="appliance">Appliance</th>
                    <th data-column-id="offset">Offset</th>
                    <th data-column-id="description">Description</th>
                    <th data-column-id="parameter">Parameter</th>
                    <th data-column-id="conversion">Conversion</th>
                    <th data-column-id="unit">Unit</th>
                    <th data-column-id="data_type">Data Type</th>
                    <th data-column-id="monitor" data-formatter="monitor">Monitor</th>
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

    var btn = '<a href="/modbusRegister/create" class="btn btn-default"><i class="fa fa-plus"></i> ADD</a>';

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '/modbusRegister',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        templates: {
            header: "<div id=\"@{{ctx.id}}\" class=\"@{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\"><p style=\"display:inline-block;margin-right:20px;\">"+btn+"</p><p class=\"@{{css.search}}\"></p><p class=\"@{{css.actions}}\"></p></div></div></div>"
        },
        formatters: {
            "commands": function(column, row) {
                return "<a class=\"btn btn-xs btn-default\" href=\"/modbusRegister/" + row.id + "/edit\"><i class=\"fa fa-edit\"></i></a> " +
                    "<button class=\"btn btn-xs btn-default c-delete\" data-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i></button>";
            },
            "monitor": function(column, row) {
                return row.monitor == 1 ? 'Yes' : 'No'
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
                url: '/modbusRegister/' + id,
                success: function(r) {
                    console.log(r);
                    $('#bootgrid').bootgrid('reload');
                }
            });
        }
    };

</script>

@endpush
