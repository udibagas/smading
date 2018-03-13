@extends('layouts.app')

@section('content')

<div class="x_panel">
    <div class="x_content">
        <h2>PEMANTAUAN {{$ruang->name}} ({{$ruang->code}})</h2>
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{$ruang->layout}}" alt="" class="img-responsive" style="height:350px"><br>
                <i>Denah {{$ruang->name}}</i>
            </div>
            <div class="col-md-3">
                <!-- <h3>STATUS PINTU</h3>
                <hr> -->
                <div class="row">
                    @foreach ($ruang->pintu as $p)
                    <div class="col-md-6 text-center">
                        <a href="{{url('pintu/'.$p->id)}}">
                            <img id="gambar_pintu{{$p->id}}" src="{{ $p->status ? asset('images/door-close.png') : asset('images/door-open.png') }}" style="width:120px;" alt="">
                            <h4>
                                {{ $p->code }} <br>
                                <small>{{ $p->name }}</small>
                            </h4>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-hover table-bordered" id="bootgrid">
                    <thead>
                        <tr>
                            <th data-column-id="created_at">Waktu Akses</th>
                            <th data-column-id="code">Kode</th>
                            <th data-column-id="name">Pintu</th>
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
        ajax: true, url: '{{url('logPintu?ruang_id='.$ruang->id)}}',
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
        // reload log
        $('#bootgrid').bootgrid('reload');

        // get status pintu
        @foreach ($ruang->pintu as $p)
        $.get('{{url("pintu/".$p->id)}}', function(j) {
            status{{$p->id}} = j.stts ? 'TERTUTUP' : 'TERBUKA';
            gambar{{$p->id}} = j.stts
                ? "{{asset('images/door-close.png')}}"
                : "{{asset('images/door-open.png')}}";

            $('#status{{$p->id}}').html(status{{$p->id}});
            $('#last_access_time{{$p->id}}').html(j.last_access_time);
            $('#last_access_by{{$p->id}}').html(j.last_access_by);
            $('#gambar_pintu{{$p->id}}').attr('src', gambar{{$p->id}});

        }, 'json');
        @endforeach

    }, 3000);

</script>

@endpush
