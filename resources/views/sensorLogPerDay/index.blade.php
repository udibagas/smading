@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>SENSOR LOG <small>Per day</small></h2>
        <table class="table table-striped table-hover" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="tanggal">Tanggal</th>
                    <th data-column-id="jam">Jam</th>
                    <th data-column-id="ruang">Ruang</th>
                    <th data-column-id="rak">Rak</th>
                    <th data-column-id="sensor">Sensor</th>
                    <th data-column-id="parameter">Parameter</th>
                    <th data-column-id="min">Min</th>
                    <th data-column-id="max">Max</th>
                    <th data-column-id="avg">Avg</th>
                    <th data-column-id="unit">Unit</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url('sensorLogPerDay')}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
        formatters: {

        }
    });
</script>

@endpush
