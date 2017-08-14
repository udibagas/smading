{!! Form::model($monitoring, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method, 'files' => true]) !!}

    <div class="form-group{{ $errors->has('gedung_id') ? ' has-error' : '' }}">
        <label for="gedung_id" class="control-label col-md-3 col-sm-3 col-xs-12">Gedung <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('gedung_id',
                \App\Gedung::orderBy('name', 'ASC')->pluck('name', 'id'),
                $monitoring->gedung_id, [
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
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-ruang_id">Ruang <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('ruang_id',
                \App\Ruang::orderBy('name', 'ASC')->pluck('name', 'id'),
                $monitoring->ruang_id, [
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

    <div class="form-group{{ $errors->has('rak_id') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-rak_id">Rak <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('rak_id',
                \App\Rak::orderBy('name', 'ASC')->pluck('name', 'id'),
                $monitoring->rak_id, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Rak --'
                ]
            ) }}

            @if ($errors->has('rak_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('rak_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('monitoring_parameter_id') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-monitoring_parameter_id">Parameter <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('monitoring_parameter_id',
                \App\MonitoringParameter::orderBy('name', 'ASC')->pluck('name', 'id'),
                $monitoring->monitoring_parameter_id, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Parameter --'
                ]
            ) }}

            @if ($errors->has('monitoring_parameter_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('monitoring_parameter_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('min_value') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Min Value <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('min_value', $monitoring->min_value, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Min Value']) }}

            @if ($errors->has('min_value'))
                <span class="help-block">
                    <strong>{{ $errors->first('min_value') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('max_value') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Max Value <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('max_value', $monitoring->max_value, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Max Value']) }}

            @if ($errors->has('max_value'))
                <span class="help-block">
                    <strong>{{ $errors->first('max_value') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="/monitoring" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
