{!! Form::model($sensor, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method, 'files' => true]) !!}

    <div class="form-group{{ $errors->has('gedung_id') ? ' has-error' : '' }}">
        <label for="gedung_id" class="control-label col-md-3 col-sm-3 col-xs-12">Gedung <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('gedung_id',
                \App\Gedung::orderBy('name', 'ASC')->pluck('name', 'id'),
                $sensor->gedung_id, [
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
                $sensor->ruang_id, [
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
        <label for="rak_id" class="control-label col-md-3 col-sm-3 col-xs-12">Rak</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('rak_id',
                \App\Rak::orderBy('name', 'ASC')->pluck('name', 'id'),
                $sensor->rak_id, [
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

    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position">Posisi <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('position', $sensor->position, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Posisi']) }}

            @if ($errors->has('position'))
                <span class="help-block">
                    <strong>{{ $errors->first('position') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('appliance_id') ? ' has-error' : '' }}">
        <label for="appliance_id" class="control-label col-md-3 col-sm-3 col-xs-12">Appliance <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('appliance_id',
                \App\Appliance::orderBy('name', 'ASC')->pluck('name', 'id'),
                $sensor->appliance_id, [
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

    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Kode Sensor <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('code', $sensor->code, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Kode Sensor']) }}

            @if ($errors->has('code'))
                <span class="help-block">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Deskripsi
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $sensor->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Deskripsi']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ip_address') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ip_address">IP Address <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('ip_address', $sensor->ip_address, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'IP Address']) }}

            @if ($errors->has('ip_address'))
                <span class="help-block">
                    <strong>{{ $errors->first('ip_address') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('snmp_version') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="snmp_version">SNMP Version </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('snmp_version',
                ['1' => '1', '2c' => '2c', '3' => 3],
                $sensor->snmp_version, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih SNMP Version --'
                ]
            ) }}

            @if ($errors->has('snmp_version'))
                <span class="help-block">
                    <strong>{{ $errors->first('snmp_version') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('snmp_community') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="snmp_community">SNMP Community </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('snmp_community', $sensor->snmp_community, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'SNMP Community']) }}

            @if ($errors->has('snmp_community'))
                <span class="help-block">
                    <strong>{{ $errors->first('snmp_community') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('modbus_offset_start') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modbus_offset_start">MODBUS Offset Start </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('modbus_offset_start', $sensor->modbus_offset_start, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'MODBUS Offset Start']) }}

            @if ($errors->has('modbus_offset_start'))
                <span class="help-block">
                    <strong>{{ $errors->first('modbus_offset_start') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('modbus_offset_end') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modbus_offset_end">MODBUS Offset End </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('modbus_offset_end', $sensor->modbus_offset_end, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'MODBUS Offset End']) }}

            @if ($errors->has('modbus_offset_end'))
                <span class="help-block">
                    <strong>{{ $errors->first('modbus_offset_end') }}</strong>
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
                $sensor->monitor, ['class' => 'form-control']
            ) }}

            @if ($errors->has('monitor'))
                <span class="help-block">
                    <strong>{{ $errors->first('monitor') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- <div class="form-group{{ $errors->has('web_access') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="web_access">Web Access </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('web_access', $sensor->web_access, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Web Access']) }}

            @if ($errors->has('web_access'))
                <span class="help-block">
                    <strong>{{ $errors->first('web_access') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('username', $sensor->username, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Username']) }}

            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('password', $sensor->password, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Password']) }}

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div> -->

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="{{url('sensor')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
