{!! Form::model($appliance, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', $appliance->name, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Name']) }}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('description', $appliance->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Description']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('manufacturer') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="manufacturer">Manufacturer <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('manufacturer', $appliance->manufacturer, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Manufacturer']) }}

            @if ($errors->has('manufacturer'))
                <span class="help-block">
                    <strong>{{ $errors->first('manufacturer') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('protocol') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="protocol">Protocol <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('protocol',
                ['modbustcp' => 'modbustcp', 'snmp' => 'snmp'],
                $appliance->protocol, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Protocol --'
                ]
            ) }}

            @if ($errors->has('protocol'))
                <span class="help-block">
                    <strong>{{ $errors->first('protocol') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <a href="{{url('appliance')}}" class="btn btn-default">BATAL</a>
        </div>
    </div>

{!! Form::close() !!}
