@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <h2>SENSOR LOG <small>Per 5 seconds</small></h2><hr>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="created_at">Waktu</th>
                    <th data-column-id="ruang">Ruang</th>
                    <th data-column-id="rak">Rak</th>
                    <th data-column-id="sensor">Sensor</th>
                    <th data-column-id="parameter">Parameter</th>
                    <th data-column-id="value">Value</th>
                    <th data-column-id="unit">Unit</th>
                    <th data-column-id="message">Message</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '/sensorLog',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {

        }
    });
</script>

@endpush
