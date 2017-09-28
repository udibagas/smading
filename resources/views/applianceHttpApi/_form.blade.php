{!! Form::model($applianceHttpApi, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('appliance_id') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appliance_id">Appliance <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('appliance_id',
                \App\Appliance::orderBy('name', 'ASC')->pluck('name', 'id'),
                $applianceHttpApi->appliance_id, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Appliance --'
                ]
            ) }}

            @if ($errors->has('appliance_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('appliance_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">URL <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('url', $applianceHttpApi->url, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'URL']) }}

            @if ($errors->has('url'))
                <span class="help-block">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $applianceHttpApi->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Description']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('monitoring_parameter_id') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monitoring_parameter_id">Monitoring Parameter <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('monitoring_parameter_id',
                \App\MonitoringParameter::orderBy('name', 'ASC')->pluck('name', 'id'),
                $applianceHttpApi->monitoring_parameter_id, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Monitoring Parameter --'
                ]
            ) }}

            @if ($errors->has('monitoring_parameter_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('monitoring_parameter_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unit">Unit <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('unit', $applianceHttpApi->unit, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Unit']) }}

            @if ($errors->has('unit'))
                <span class="help-block">
                    <strong>{{ $errors->first('unit') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('data_type') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_type">Data Type <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('data_type', $applianceHttpApi->data_type, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Data Type']) }}

            @if ($errors->has('data_type'))
                <span class="help-block">
                    <strong>{{ $errors->first('data_type') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('monitor') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monitor">Monitor <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('monitor',
                [1 => 'Yes', 0 => 'No'],
                $applianceHttpApi->monitor, ['class' => 'form-control']
            ) }}

            @if ($errors->has('monitor'))
                <span class="help-block">
                    <strong>{{ $errors->first('monitor') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="{{url('applianceHttpApi')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
