@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>ALARM</h2>
        <table class="table table-striped table-hover table-bordered" id="bootgrid">
            <thead>
                <tr>
                    <th data-column-id="id">ID</th>
                    <th data-column-id="nama">Pesan</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">

    var grid = $('#bootgrid').bootgrid({
        ajax: true, url: '{{url('alarm')}}',
        ajaxSettings: {method: 'GET', cache: false},
        searchSettings: { delay: 100, characters: 3 },
    });

</script>

@endpush
