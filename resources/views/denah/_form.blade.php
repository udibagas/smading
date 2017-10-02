{!! Form::model($denah, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method, 'files' => true]) !!}

    <div class="form-group{{ $errors->has('gedung_id') ? ' has-error' : '' }}">
        <label for="gedung_id" class="control-label col-md-3 col-sm-3 col-xs-12">Gedung <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('gedung_id',
                \App\Gedung::orderBy('name', 'ASC')->pluck('name', 'id'),
                $denah->gedung_id, [
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

    <div class="form-group{{ $errors->has('lantai') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-lantai">Lantai <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('lantai', $denah->lantai, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Lantai']) }}

            @if ($errors->has('lantai'))
                <span class="help-block">
                    <strong>{{ $errors->first('lantai') }}</strong>
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
            <a href="{{url('denah')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
