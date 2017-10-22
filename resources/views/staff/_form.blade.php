{!! Form::model($staff, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-nama">Nama <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('nama', $staff->nama, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama']) }}

            @if ($errors->has('nama'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-jabatan">Jabatan <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('jabatan', $staff->jabatan, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Jabatan']) }}

            @if ($errors->has('jabatan'))
                <span class="help-block">
                    <strong>{{ $errors->first('jabatan') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="{{url('staff')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}