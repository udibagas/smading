{!! Form::model($monitoringParameter, ['class' => 'form-horizontal form-label-left', 'url' => $url, 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('monitoring_group_id') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="monitoring_group_id">Monitoring Group <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('monitoring_group_id',
                \App\MonitoringGroup::orderBy('name', 'ASC')->pluck('name', 'id'),
                $monitoringParameter->monitoring_group_id, [
                    'class' => 'form-control',
                    'placeholder' => '-- Pilih Monitoring Group --'
                ]
            ) }}

            @if ($errors->has('monitoring_group_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('monitoring_group_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name', $monitoringParameter->name, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Name']) }}

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
            {{ Form::text('description', $monitoringParameter->description, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Description']) }}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unit">Unit <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('unit', $monitoringParameter->unit, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Unit']) }}

            @if ($errors->has('unit'))
                <span class="help-block">
                    <strong>{{ $errors->first('unit') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('min_value') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="min_value">Min Value <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('min_value', $monitoringParameter->min_value, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Min Value']) }}

            @if ($errors->has('min_value'))
                <span class="help-block">
                    <strong>{{ $errors->first('min_value') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('max_value') ? ' has-error' : '' }}">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="max_value">Max Value <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('max_value', $monitoringParameter->max_value, ['class' => 'form-control  col-md-7 col-xs-12', 'placeholder' => 'Max Value']) }}

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
<<<<<<< HEAD
            <a href="{{url('monitoringParameter')}}" class="btn btn-default">BATAL</a>
=======
            <a href="{{('monitoringParameter')}}" class="btn btn-default">BATAL</a>
>>>>>>> e45b8fe9e055fbe0feec610c0feead5b0a696276
        </div>
    </div>

{!! Form::close() !!}
