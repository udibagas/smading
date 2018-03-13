@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>SENSOR LOG <small>Per 5 seconds</small></h2>
        <table class="table table-striped table-hover table-bordered" id="bootgrid">
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
        ajax: true, url: '{{url('sensorLog')}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {

        }
    });
</script>

@endpush
