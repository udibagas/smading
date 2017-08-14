{!! Form::model($gedung, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Gedung <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', $gedung->name, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Gedung']) }}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Gedung <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('code', $gedung->code, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kode Gedung']) }}

            @if ($errors->has('code'))
                <span class="help-block">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('jumlah_lantai') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Lantai <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('jumlah_lantai', $gedung->jumlah_lantai, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Jumlah Lantai']) }}

            @if ($errors->has('jumlah_lantai'))
                <span class="help-block">
                    <strong>{{ $errors->first('jumlah_lantai') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $gedung->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Deskripsi']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="/gedung" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
