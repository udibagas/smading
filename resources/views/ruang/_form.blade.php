{!! Form::model($ruang, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method, 'files' => true]) !!}

    <div class="form-group{{ $errors->has('gedung_id') ? ' has-error' : '' }}">
        <label for="gedung_id" class="control-label col-md-3 col-sm-3 col-xs-12">Gedung <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('gedung_id',
                \App\Gedung::orderBy('name', 'ASC')->pluck('name', 'id'),
                $ruang->gedung_id, [
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

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Ruang <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', $ruang->name, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Nama Ruang']) }}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Ruang <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('code', $ruang->code, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kode Ruang']) }}

            @if ($errors->has('code'))
                <span class="help-block">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('lantai') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Lantai <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('lantai', $ruang->lantai, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Lantai']) }}

            @if ($errors->has('lantai'))
                <span class="help-block">
                    <strong>{{ $errors->first('lantai') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Deskripsi <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $ruang->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Deskripsi']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
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
            <a href="/ruang" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
