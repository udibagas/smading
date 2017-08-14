{!! Form::model($snmpOid, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('appliance_id') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appliance_id">Appliance <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('appliance_id',
                \App\Appliance::orderBy('name', 'ASC')->pluck('name', 'id'),
                $snmpOid->appliance_id, [
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

    <div class="form-group{{ $errors->has('oid') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oid">OID <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('oid', $snmpOid->oid, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'OID']) }}

            @if ($errors->has('oid'))
                <span class="help-block">
                    <strong>{{ $errors->first('oid') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', $snmpOid->name, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Name']) }}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('substr_output') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="substr_output">Substr Output <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('substr_output', $snmpOid->substr_output, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Substr Output']) }}

            @if ($errors->has('substr_output'))
                <span class="help-block">
                    <strong>{{ $errors->first('substr_output') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $snmpOid->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Description']) }}

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
                $snmpOid->monitoring_parameter_id, [
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

    <div class="form-group{{ $errors->has('conversion') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="conversion">Conversion <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('conversion', $snmpOid->conversion, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Conversion']) }}

            @if ($errors->has('conversion'))
                <span class="help-block">
                    <strong>{{ $errors->first('conversion') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unit">Unit <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('unit', $snmpOid->unit, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Unit']) }}

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
            {{ Form::text('data_type', $snmpOid->data_type, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Data Type']) }}

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
                $snmpOid->monitor, ['class' => 'form-control']
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
            <a href="/snmpOid" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
