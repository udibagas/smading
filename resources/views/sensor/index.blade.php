@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>SENSOR <small>Manage</small></h2>
        <table class="table table-striped table-hover table-bordered" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id" data-identifier="true" data-type="numeric">ID</th>
                    <th data-column-id="gedung">Building</th>
                    <th data-column-id="lantai">Floor</th>
                    <th data-column-id="ruang">Room</th>
                    <th data-column-id="rak">Rack</th>
                    <th data-column-id="position">Position</th>
                    <th data-column-id="appliance">Appliance</th>
                    <th data-column-id="protocol">Protocol</th>
                    <th data-column-id="code">Code</th>
                    <th data-column-id="description">Description</th>
                    <th data-column-id="ip_address">IP Address</th>
                    <th data-column-id="snmp_version">SNMP Version</th>
                    <th data-column-id="snmp_community">SNMP Community</th>
                    <th data-column-id="modbus_device_id">MODBUS Device ID</th>
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

    var btn = '<a href="{{url('sensor/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> TAMBAH</a>';

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url('sensor')}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        templates: {
            header: "<div id=\"@{{ctx.id}}\" class=\"@{{css.header}}\"><div class=\"row\"><div class=\"col-sm-12 actionBar\"><p style=\"display:inline-block;margin-right:20px;\">"+btn+"</p><p class=\"@{{css.search}}\"></p><p class=\"@{{css.actions}}\"></p></div></div></div>"
        },
        formatters: {
            "commands": function(column, row) {
                return "<a class=\"btn btn-xs btn-default\" href=\"{{url('sensor')}}/" + row.id + "/edit\"><i class=\"fa fa-edit\"></i></a> " +
                    "<button class=\"btn btn-xs btn-default c-delete\" data-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i></button>";
            },
            "monitor": function(column, row) {
                return row.monitor == 1 ? 'Yes' : 'No'
            },
            // "gedung": function(column, row) {
            //     return row.gedung + '/' + row.lantai;
            // }
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
                url: '{{url("sensor")}}/' + id,
                success: function(r) {
                    console.log(r);
                    $('#bootgrid').bootgrid('reload');
                }
            });
        }
    };

</script>

@endpush
