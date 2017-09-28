{!! Form::model($sop, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method, 'files' => true]) !!}

    <div class="form-group{{ $errors->has('nomor') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-nomor">Nomor <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nomor', $sop->nomor, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nomor']) }}

            @if ($errors->has('nomor'))
                <span class="help-block">
                    <strong>{{ $errors->first('nomor') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Judul <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('judul', $sop->judul, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Judul']) }}

            @if ($errors->has('judul'))
                <span class="help-block">
                    <strong>{{ $errors->first('judul') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Isi <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::textarea('isi', $sop->isi, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Isi', 'rows' => 5]) }}

            @if ($errors->has('isi'))
                <span class="help-block">
                    <strong>{{ $errors->first('isi') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gambar <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="file" name="gambar" class="form-control">

            @if ($errors->has('gambar'))
                <span class="help-block">
                    <strong>{{ $errors->first('gambar') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="{{url('sop')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
