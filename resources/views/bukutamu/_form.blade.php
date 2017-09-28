{!! Form::model($bukutamu, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-nama">Nama <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama', $bukutamu->nama, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama']) }}

            @if ($errors->has('nama'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('instansi') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Instansi <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('instansi', $bukutamu->instansi, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Instansi']) }}

            @if ($errors->has('instansi'))
                <span class="help-block">
                    <strong>{{ $errors->first('instansi') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jabatan <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('jabatan', $bukutamu->jabatan, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Jabatan']) }}

            @if ($errors->has('jabatan'))
                <span class="help-block">
                    <strong>{{ $errors->first('jabatan') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('tujuan') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tujuan <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('tujuan', $bukutamu->tujuan, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Tujuan']) }}

            @if ($errors->has('tujuan'))
                <span class="help-block">
                    <strong>{{ $errors->first('tujuan') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('masuk') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Masuk <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('masuk', $bukutamu->masuk, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Masuk']) }}

            @if ($errors->has('masuk'))
                <span class="help-block">
                    <strong>{{ $errors->first('masuk') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('keluar') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keluar <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('keluar', $bukutamu->keluar, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Keluar']) }}

            @if ($errors->has('keluar'))
                <span class="help-block">
                    <strong>{{ $errors->first('keluar') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="{{url('bukutamu')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
