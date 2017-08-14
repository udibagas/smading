{!! Form::model($rak, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method, 'files' => true]) !!}

    <div class="form-group{{ $errors->has('gedung_id') ? ' has-error' : '' }}">
        <label for="gedung_id" class="control-label col-md-3 col-sm-3 col-xs-12">Gedung <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('gedung_id',
                \App\Gedung::orderBy('name', 'ASC')->pluck('name', 'id'),
                $rak->gedung_id, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Gedung --'
                ]
            ) }}

            @if ($errors->has('gedung_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('gedung_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ruang_id') ? ' has-error' : '' }}">
        <label for="ruang_id" class="control-label col-md-3 col-sm-3 col-xs-12">Ruang <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('ruang_id',
                \App\Ruang::orderBy('name', 'ASC')->pluck('name', 'id'),
                $rak->ruang_id, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Ruang --'
                ]
            ) }}

            @if ($errors->has('ruang_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('ruang_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Rak <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', $rak->name, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Rak']) }}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Rak <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('code', $rak->code, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kode Rak']) }}

            @if ($errors->has('code'))
                <span class="help-block">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $rak->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Deskripsi']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('dimensi') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dimensi (PxLxT dalam cm) <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('dimensi', $rak->dimensi, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Dimensi']) }}

            @if ($errors->has('dimensi'))
                <span class="help-block">
                    <strong>{{ $errors->first('dimensi') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('kapasitas') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kapasitas (Jumlah U) <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('kapasitas', $rak->kapasitas, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kapasitas']) }}

            @if ($errors->has('kapasitas'))
                <span class="help-block">
                    <strong>{{ $errors->first('kapasitas') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('layout') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Layout <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="file" name="layout" class="form-control">

            @if ($errors->has('layout'))
                <span class="help-block">
                    <strong>{{ $errors->first('layout') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="/rak" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
